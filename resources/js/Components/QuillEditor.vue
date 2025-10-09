<!-- Save as: resources/js/Components/QuillEditor.vue -->
<template>
    <div>
        <div ref="editor" class="quill-editor"></div>
    </div>
</template>

<script setup>
import { ref, onMounted, watch, onBeforeUnmount } from 'vue'
import Quill from 'quill'
import 'quill/dist/quill.snow.css'

const props = defineProps({
    modelValue: {
        type: String,
        default: ''
    },
    placeholder: {
        type: String,
        default: 'Enter description...'
    },
    height: {
        type: String,
        default: '200px'
    }
})

const emit = defineEmits(['update:modelValue'])

const editor = ref(null)
let quill = null

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: 'snow',
        placeholder: props.placeholder,
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                ['clean'],
                ['link']
            ]
        }
    })

    // Set height
    editor.value.querySelector('.ql-editor').style.minHeight = props.height

    // Set initial content
    if (props.modelValue) {
        quill.root.innerHTML = props.modelValue
    }

    // Listen for text changes
    quill.on('text-change', () => {
        const html = quill.root.innerHTML
        emit('update:modelValue', html === '<p><br></p>' ? '' : html)
    })
})

// Watch for external changes to modelValue
watch(() => props.modelValue, (newValue) => {
    if (quill && quill.root.innerHTML !== newValue) {
        quill.root.innerHTML = newValue || ''
    }
})

onBeforeUnmount(() => {
    if (quill) {
        quill = null
    }
})
</script>

<style>
.quill-editor .ql-toolbar {
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: none;
}

.quill-editor .ql-container {
    border-bottom: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-top: none;
}

.quill-editor .ql-editor {
    font-family: inherit;
    font-size: 14px;
}

.quill-editor .ql-editor.ql-blank::before {
    color: #999;
    font-style: italic;
}
</style>
