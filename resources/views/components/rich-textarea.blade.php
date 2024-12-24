@props(['placeholder' => 'description'])

<div id="toolbar-container">
    <span class="ql-formats">
        <select class="ql-font"></select>
        <select class="ql-size"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
    </span>
    <span class="ql-formats">
        <select class="ql-color"></select>
        <select class="ql-background"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-script" value="sub"></button>
        <button class="ql-script" value="super"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-header" value="1"></button>
        <button class="ql-header" value="2"></button>
        <button class="ql-blockquote"></button>
        <button class="ql-code-block"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-list" value="ordered"></button>
        <button class="ql-list" value="bullet"></button>
        <button class="ql-indent" value="-1"></button>
        <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-direction" value="rtl"></button>
        <select class="ql-align"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-link"></button>
        <button class="ql-image"></button>
        <button class="ql-video"></button>
        <button class="ql-formula"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-clean"></button>
    </span>
</div>

<div id="editor" class="h-36">
    {{ $slot }}
</div>

<textarea id="hiddenInput" {{ $attributes->merge(['class' => 'sr-only']) }} x-model="content">
    {{ $slot }}
</textarea>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('richTextEditor', (initialContent = '') => ({
            content: initialContent,

            init() {
                this.quill = new Quill('#editor', {
                    modules: {
                        toolbar: '#toolbar-container',
                    },
                    placeholder: @json($placeholder),
                    theme: 'snow',
                });

                this.quill.root.innerHTML = this.content;

                this.quill.on('text-change', () => {
                    this.content = this.quill.root.innerHTML;
                });
            },
        }));
    });
</script>
