<script setup>
import { reactive, ref } from "vue";
import MyContact from "@components/Sections/MyContact.vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

let form = reactive({});
let mailLoading = ref(false);
let rules = reactive({
  name: [
    {
      required: true,
      message: "Full Name is required.",
      trigger: "blur",
    },
    {
      min: 3,
      max: 50,
      message: "Length should be 3 to 50",
      trigger: "blur",
    },
  ],
  phoneNumber: [
    {
      required: true,
      message: "Phone Number is required.",
      trigger: "blur",
    },
    {
      min: 3,
      max: 17,
      message: "Length should be 3 to 17",
      trigger: "blur",
    },
  ],
  email: [
    {
      required: true,
      message: "Email is required.",
      trigger: "blur",
    },
    {
      type: "email",
      message: "Please enter valid email",
      trigger: "blur",
    },
  ],
  message: [
    {
      required: true,
      message: "Message is required.",
      trigger: "blur",
    },
  ],
});
function sendMail() {
  mailLoading.value = true;

  // this.$refs.ruleForm.validate((valid) => {
  //   if (valid) {
  //     Email.send({
  //       Host: 'smtp.elasticemail.com',
  //       Username: 'stephanakhtar.web@gmail.com',
  //       Password: '7AF83909F8EAC86E2E241F40E7138F8D5A7A',
  //       To: 'shahzebakhtar892@gmail.com',
  //       From: 'stephanakhtar.web@gmail.com',
  //       Subject: form.subject || '',
  //       Body: `name : ${form.name} , phone Number : ${form.phoneNumber} , email : ${form.message}`,
  //     }).then((e) => {
  //       this.mailLoading = false

  //       if (e == 'OK') {
  //         this.form = {}
  //         this.$notification.success({
  //           message: 'Email send',
  //         })
  //       } else {
  //         this.$notification.error({
  //           message: 'Email sending failed',
  //           description: e,
  //         })
  //       }
  //     })
  //   }
  // })
}
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Contact</h2>
    </template>
    <MyContact />
  </AuthenticatedLayout>
</template>

<style lang="scss">
.contact-info {
  padding: 9rem 0rem;
  .contact {
    .info {
      .c-item {
        padding: 2rem 0rem;
        .heading {
          font-size: large;
          font-weight: 700;
          color: var(--theme-black-color);
          i {
            padding-right: 2rem;
          }
        }
        .details {
          padding-left: 5.5rem;
        }
      }
    }

    .message-box {
      .box {
        width: 52rem;
        margin: auto;
        padding: 2rem;
        border-radius: 2rem;
        box-shadow: 0px 0px 55px -14px var(--box-shadow-color);
        .b-item {
          margin: 2rem 0rem;
          button {
            width: 100%;
          }
        }
      }
    }
  }
  .social-links {
    ul {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 5rem;
      li {
        margin: 0.5rem 1.5rem;
        border-radius: 50%;
        font-size: 6.5rem;
        list-style-type: none;
        a {
          text-decoration: none;
          i {
            color: var(--text-primary-color);
            height: 5.55rem;
            background: inherit;
            width: 4.5rem;
            display: flex;
            justify-content: center;
            line-height: 5.5rem;
            transition: 0.4s;
          }
          &:hover i {
            color: var(--theme-primary-color);
            background: #ffffff;
          }
        }
      }
    }
  }
}
@media screen and (max-width: 350px) {
  .contact-info {
    .contact {
      .box {
        width: 100% !important;
      }
    }
  }
}
</style>
