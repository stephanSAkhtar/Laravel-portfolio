<template>
  <div id="custom-file-upload">
    <label :for="id">
      <slot name="label">
        <div class="label" :class="{ required: required }">
          {{ label }}
        </div>
      </slot>
    </label>
    <div class="file-upload-container mt-8">
      <div v-if="file" class="file-upload-preview-container">
        <!-- file upload -->
      </div>
      <div class="file-upload-button-container" :class="classes" @click="uploadFile" v-if="showUploadBtn">
        <div class="file-upload-button-content">
          <i class="fa-solid fa-paperclip"></i>
          <div class="file-upload-label">{{ btnText }}</div>
        </div>
      </div>
      <input type="file" ref="uploadInput" v-show="false" accept=".pdf" @change="handleFiles" />
    </div>
  </div>
</template>

<script setup>
import { computed, ref, watch } from "vue";

let props = defineProps({
  required: {
    type: Boolean,
    default: false,
  },
  id: {
    type: String,
    default: "",
  },
  modelValue: {
    type: [FormData],
    default: null,
  },
  btnText: {
    type: String,
    default: "Upload File",
  },
  label: {
    type: String,
    default: "File",
  },
  classes: {
    type: String,
    default: "",
  },
});
let emit = defineEmits();

const file = ref(null);
const uploadInput = ref(null);
const showUploadBtn = computed(() => {
  let visible = false;
  if (file.value) {
    visible = false;
  } else {
    visible = true;
  }
  return visible;
});
function handleFiles(event) {


  // Update files and generate previews
  file.value = event.target.files
  emit(
    "updateFile",
    event.target.files
  );
}
function removeFile(index) {
  file.value = null
}

function uploadFile() {
  if (uploadInput.value) {
    uploadInput.value.click();
  }
}

</script>

<style lang="scss">
$file-upload-preview-size: 100px;

#custom-file-upload {
  .label {}

  .file-upload-container {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .file-upload-preview-container {
    display: flex;
    gap: 0.625rem;
    flex-wrap: wrap;
    height: 8rem;
  }

  .file-upload-preview {
    position: relative;
    width: $file-upload-preview-size;
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

  .file-upload-preview-remove {
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

  .file-upload-button-container {
    min-width: $file-upload-preview-size;
    height: $file-upload-preview-size;
    cursor: pointer;
    background-color: #f3f4f6;
    border-radius: 0.375rem;
    border: 2px dashed #e5e7eb;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .file-upload-button-content {
    text-align: center;

    .file-upload-label {
      color: #6b7280;
    }
  }

  .file-upload-label {
    color: #6b7280;
  }

  .preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    height: 8rem;
  }

  .file-preview {
    position: relative;
    width: 100px;
    height: 100%;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
  }

  .file-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .file-preview button {
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
}
</style>
