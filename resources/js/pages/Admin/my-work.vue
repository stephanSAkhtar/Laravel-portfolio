<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MyWork from "@components/Sections/MyWork.vue";

import { computed, ref } from "vue";

const activeTab = ref("all");
let tabs = [
  {
    id: 1,
    key: "all",
    name: "All",
  },
  {
    id: 2,
    key: "html",
    name: "HTML",
  },
  {
    id: 3,
    key: "vue_js",
    name: "VUE JS",
  },
];
let myWork = ref({
  html: [
    {
      id: 4,
      image:
        "https://cdn3.vectorstock.com/i/1000x1000/95/17/online-shopping-card-vector-21509517.jpg",
      name: "Shopping Web",
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
    },
    {
      id: 5,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://i.pinimg.com/736x/e0/d5/d2/e0d5d259ecbb26b3e81c559cdba1f4db.jpg",
      name: "Chat App",
    },

    {
      id: 12,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://img.freepik.com/free-vector/hand-drawn-construction-project-landing-page_23-2149694928.jpg?q=10&h=200",
      name: "Construction",
    },

    {
      id: 13,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://image.isu.pub/170601131610-51f1732c2c93789115216f24651a5349/jpg/page_1_thumb_large.jpg",
      name: "School CMS",
    },
    {
      id: 14,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/328527341/original/ff79190b1793f9df381660257e29005e7c48b5b3/do-any-graphic-design-work.png",
      name: "Graphic Designer",
    },
    {
      id: 21,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://static.vecteezy.com/system/resources/previews/001/434/261/non_2x/web-development-isometric-landing-page-vector.jpg",
      name: "Developer",
    },
    {
      id: 22,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://img.freepik.com/premium-vector/stock-exchange-platform-landing-page_23-2148593745.jpg",
      name: "Stock Exchange",
    },
    {
      id: 30,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://static.vecteezy.com/system/resources/previews/019/097/214/non_2x/our-services-assemble-customize-electronics-engineering-parts-solid-glyph-icon-web-card-template-free-vector.jpg",
      name: "Engineering",
    },
    {
      id: 31,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://d2qp0siotla746.cloudfront.net/img/features/photo-editor/hero.png",
      name: "Editing",
    },
  ],
  vue_js: [
    {
      id: 6,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-6kBYF4Nqd-bPW2fprbNvY41fp0xqqcrjUw&usqp=CAU",
      name: "RBPO Services",
    },
    {
      id: 7,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp9uGNAEfG_EtIpOrBZOSYbkwvBHad0zFRZg&usqp=CAU",
      name: "Copilot",
    },
    {
      id: 8,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://i.pinimg.com/564x/a6/1a/3a/a61a3a1057d00eff335486255dbe9868.jpg",
      name: "Restaurant Management Services",
    },
    {
      id: 9,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://img.freepik.com/premium-psd/linkedin-profile-style-business-card-template-psd_644552-350.jpg?w=600",
      name: "Linked IN",
    },
    {
      id: 10,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcKJuco99B5QGFgsTaDrJVf53CW8qGFxfBpQ&usqp=CAU",
      name: "Face Book",
    },
    {
      id: 16,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://img.freepik.com/free-vector/import-export-flat-design-landing-page_52683-76256.jpg",
      name: "Import Export",
    },
    {
      id: 17,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://image.slidesharecdn.com/olxfinalppt-141003041056-phpapp01/85/olx-ppt-with-its-campaign-1-320.jpg?cb=1666777281",
      name: "OLX",
    },
    {
      id: 18,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://img.freepik.com/free-vector/cashabck-concept-with-cash-register_23-2148475251.jpg?size=338&ext=jpg&ga=GA1.1.1413502914.1697155200&semt=ais",
      name: "Cash",
    },
    {
      id: 19,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROrK3dgaZTLoHSim603xOF7TSsH1SIi-Eni4kIC2PYeGSZz32c3dRYUMCuXxh0s_Lz_F8&usqp=CAU",
      name: "Online Trading",
    },
    {
      id: 20,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNugWsKhhfKZVjuRr9gV4OVhdWJVFf4-5ryg&usqp=CAU",
      name: "Online Shopping",
    },
    {
      id: 23,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://d1hdtc0tbqeghx.cloudfront.net/wp-content/uploads/2023/04/10114555/Calendly-1.png",
      name: "Calendly",
    },
    {
      id: 24,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRPsZDytBh3mV1DKMT2g2WMJlxSoZpDYJX-S3Cta8_8318UbfeQzK7KjlsmX_1KRc5P_A&usqp=CAU",
      name: "Web Designing",
    },
    {
      id: 25,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://colorlib.com/wp/wp-content/uploads/sites/2/library-website-design.jpg",
      name: "Library Website",
    },
    {
      id: 26,
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, pariatur amet dignissimos corrupti porro est. Vero fuga doloremque eius veniam consectetur aliquid magni totam, possimus mollitia ipsam iste, commodi minus?",
      image:
        "https://i.pinimg.com/originals/e8/17/00/e817007f1231f6e1c050847dcd968044.jpg",
      name: "News Website",
    },
  ],
});
let workDataLimit = ref(7);

const activeTabData = computed(() => {
  let data = myWork.value;

  const allData = [...data.html, ...data.vue_js];
  return activeTab.value == "all" ? allData : myWork.value[activeTab.value];
});
const setActiveTab = (value) => {
  activeTab.value = value;
};
function handleWorkData(val) {
  let offSet = workDataLimit.value;
  let result = val.slice(0, offSet);
  return result;
}
function loadMore(limit) {
  console.log(limit, workDataLimit.value);
  if (limit >= workDataLimit.value) {
    workDataLimit.value += 3;
  } else {
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Work</h2>
    </template>
    <MyWork />
  </AuthenticatedLayout>
</template>

<style lang="scss">
.my-work {
  .tabs {
    text-align: center;
    .work-cards {
      column-count: 3;
      column-gap: 2rem;
      li {
        list-style: none;
        padding-bottom: 1.5rem;
        position: relative;
        margin-right: 1.5rem;

        img {
          width: 100%;
          object-fit: cover;
          border-radius: 2rem;
          border: 1rem solid #fff;
          box-shadow: 0rem 0.3rem 0.9rem 0rem #d0cccc;
        }

        .overlay {
          max-width: calc(100% - 1rem);
          position: absolute;
          padding-left: 1rem;
          margin: 1rem;
          left: 0rem;
          bottom: 1.78rem;
          border-bottom-left-radius: 1rem;
          border-bottom-right-radius: 1rem;
          height: 0%;
          font-weight: 400;
          transition: 0.7s ease-in;
          background-color: var(--primary-transparent-color);
          color: var(--text-white-color);
          overflow: hidden;
          text-align: left;
          width: 100%;
          .name {
            display: block;
            cursor: pointer;
            font-weight: 600;
            margin: 1rem 0rem;
            font-size: 2rem;
            a {
              color: inherit;
            }
            &:hover {
              text-decoration: underline;
            }
          }
          .desc {
            text-wrap: nowrap;
            cursor: context-menu;
            max-width: 99% !important;
            text-overflow: ellipsis;
            display: block;
            overflow: hidden;
            margin: 1rem 0rem;
          }
        }
        &:hover .overlay {
          height: 35%;
        }
      }
    }
  }
}
</style>
