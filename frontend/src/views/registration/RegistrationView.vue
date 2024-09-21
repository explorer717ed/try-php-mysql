<template>
  <main class="register_page">
    <h1 class="page_title">Sign up</h1>
    <form class="form" @submit="onSubmit" action="javascript:;" novalidate>
      <div class="form_item">
        <label for="sign_username" class="form_item-label">Email (username):</label>
        <input v-model="dataSignup.username" @change="checkUserExist" required type="email" id="sign_username" class="form_item-input" placeholder="abc@mail.com">
        <div :class="{'form_item-tip': true, 'form_item-tip--error': formErrMsg.username }">{{ formErrMsg.username }}</div>
      </div>
      <div class="form_item">
        <label for="sign_pass" class="form_item-label">Password:</label>
        <input v-model="dataSignup.pass" required type="password" id="sign_pass" class="form_item-input" placeholder="Input your password">
        <div class="form_item-tip">
          The password should be at least 8 alphanumeric, include 1 number and 1 alphabet.
        </div>
      </div>
      <div class="form_item">
        <label for="sign_confirm_pass" class="form_item-label">Confirm Password:</label>
        <input v-model="dataSignup.confirm" required type="password" id="sign_confirm_pass" class="form_item-input" placeholder="Input your password again">
        <div class="form_item-tip"></div>
      </div>
      <div class="form_item">
        <label for="sign_name" class="form_item-label">Your Name:</label>
        <input v-model="dataSignup.name" required type="text" id="sign_name" class="form_item-input" placeholder="John Lee">
        <div class="form_item-tip"></div>
      </div>
      <button type="submit" class="btn btn--primary">NEXT</button>
      <div>
        <hr class="divider">
        <small>or sign up with</small>
        <br>
        <button disabled class="btn btn--secondary">Google</button>
        <button disabled class="btn btn--secondary">Facebook</button>
      </div>
    </form>
  </main>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useFetch } from "@/composables/useFetch";
import { useRouter } from 'vue-router';

const router = useRouter();
const { post } = useFetch()

const dataSignup = ref({
  username: '',
  pass: '',
  confirm: '',
  name: ''
})

const formErrMsg = ref({
  username: "",
  pass: "",
  confirm: "",
})

const checkSignupValidity = () => {
  return true
}


const onSubmit = async () => {
  // Form validation
  const isValid = checkSignupValidity()
  console.log('isValid:', isValid);
  
  

  // TODO: CAPTCHA


  // Submit
  try {
    const data = await post('/member/create.php', {
      username: dataSignup.value.username,
      password: dataSignup.value.pass,
      name: dataSignup.value.name
    })

    console.log(data);
    if(data.success) {
      router.push({ name: 'registration-complete', query: { id: data.payload.id } })
    }
    
  } catch (error) {
    console.error(error);
  }
}

const checkUserExist = async () => {
  console.log('exist', dataSignup.value.username);
  try {
    const data = await post('/member/check_duplicate.php', {
      username: dataSignup.value.username,
    })

    formErrMsg.value.username = data.is_unique ? '' : "This user already exists."
    
  } catch (error) {
    console.error(error);
  }
}
</script>

<style scoped>
.register_page{
  max-width: 600px;
  margin: auto;
}
.page_title{
  text-align: center;
}
.form{
  text-align: center;
}
.form_item{
  margin-top: 10px;
  margin-bottom: 10px;
}
.form_item-label{
  width: 100%;
  margin-bottom: 5px;
  display: inline-block;
  text-align: left;
}
.form_item-input{
  width: 100%;
  padding: 10px 10px;
  font-size: 1rem;
  border-radius: 5px;
  color: var(--color-text);
  border: 1px solid var(--color-border);
  background-color: var(--color-background-soft);
}
.form_item-input:hover{
  background-color: var(--color-background-mute);

}

.form_item-tip{
  text-align: left;
  margin-left: auto;
  min-height: 1rem;
  margin-top: 5px;
  font-size: .8rem;
}

.form_item-tip--error{
  color: salmon;
}
</style>