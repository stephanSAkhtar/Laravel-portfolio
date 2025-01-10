<template>
  <div class="image-upload-container">
    <div v-if="previewImages.length" class="image-upload-preview-container">
      <div
        v-for="(image, index) in previewImages"
        :key="index"
        class="image-upload-preview"
      >
        <img :src="image" alt="Preview" />
        <button @click="removeImage(index)" class="image-upload-preview-remove">
          x
        </button>
      </div>
    </div>
    <div
      class="image-upload-button-container"
      :class="classes"
      @click="uploadImage"
      v-if="showUploadBtn"
    >
      <div class="image-upload-button-content">
        +
        <div class="image-upload-label">{{ label }}</div>
      </div>
    </div>
    <input
      type="file"
      ref="uploadInput"
      v-show="false"
      :multiple="multiple"
      accept="image/*"
      @change="handleFiles"
    />
  </div>
</template>

<script setup>
import { computed, ref, watch } from "vue";

let props = defineProps({
  multiple: {
    type: Boolean,
    default: false,
  },
  modelValue: {
    type: [Array, FormData],
    default: () => [],
  },
  label: {
    type: String,
    default: "Upload Image",
  },
  classes: {
    type: String,
    default: "",
  },
});
let emit = defineEmits();

const files = ref([]);
const previewImages = ref([]);
const uploadInput = ref(null);
const showUploadBtn = computed(() => {
  let visible = false;
  if (!props.multiple && previewImages.value.length == 1) {
    visible = false;
  } else {
    visible = true;
  }
  return visible;
});
function handleFiles(event) {
  const selectedFiles = Array.from(event.target.files);

  // Update files and generate previews
  files.value = props.multiple
    ? [...files.value, ...selectedFiles]
    : selectedFiles;

  previewImages.value = files.value.map((file) => URL.createObjectURL(file));
}
function removeImage(index) {
  files.value.splice(index, 1);
  previewImages.value.splice(index, 1);
}

function uploadImage() {
  if (uploadInput.value) {
    uploadInput.value.click();
  }
}
watch(
  () => previewImages.value,
  () => {
    emit("updateImage", props.multiple ? files.value : files.value[0]);
  },
  {
    deep: true,
  }
);
</script>

<style lang="scss">
$image-upload-preview-size: 100px;

.image-upload-container {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.image-upload-preview-container {
  display: flex;
  gap: 0.625rem;
  flex-wrap: wrap;
  height: 8rem;
}

.image-upload-preview {
  position: relative;
  width: $image-upload-preview-size;
  height: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  overflow: hidden;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}

.image-upload-preview-remove {
  position: absolute;
  top: 0.3125rem;
  right: 0.3125rem;
  background-color: rgba(245, 245, 245, 0.993);
  border: none;
  border-radius: 50%;
  padding: 0.1875rem;
  width: 2.5rem;
  height: 2.5rem;
  cursor: pointer;
}

.image-upload-button-container {
  width: $image-upload-preview-size;
  height: $image-upload-preview-size;
  cursor: pointer;
  background-color: #f3f4f6;
  border-radius: 0.375rem;
  border: 2px dashed #e5e7eb;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image-upload-button-content {
  text-align: center;

  .image-upload-label {
    color: #6b7280;
  }
}

.image-upload-label {
  color: #6b7280;
}

.preview-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  height: 8rem;
}

.image-preview {
  position: relative;
  width: 100px;
  height: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  overflow: hidden;
}

.image-preview img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.image-preview button {
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: rgba(245, 245, 245, 0.993);
  border: none;
  border-radius: 50%;
  padding: 0.3rem;
  width: 2.5rem;
  height: 2.5rem;
  cursor: pointer;
}
</style>
