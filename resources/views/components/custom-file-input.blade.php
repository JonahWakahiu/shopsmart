<label for="imageUploads" x-data="imageUpload"
    class="cursor-pointer relative flex w-full min-h-48 flex-col items-center justify-center gap-2 rounded-md border border-dashed border-slate-300 p-8 text-slate-700 dark:border-slate-700 dark:text-slate-300">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
        class="w-12 h-12 opacity-75">
        <path fill-rule="evenodd"
            d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z"
            clip-rule="evenodd" />
    </svg>

    <div class="group">
        <span class="cursor-pointer font-medium text-blue-700 group-focus-within:underline dark:text-blue-600">
            <input type="file" {{ $attributes->merge(['class' => 'hidden sr-only']) }} x-ref="fileInput" multiple
                @change="previewImages($event)" id="imageUploads">
            Browse</span>
        or drag and drop here
    </div>
    <small id="validFileFormats">PNG, JPG, WebP - Max 5MB</small>

    <div class=" mt-4 flex flex-wrap flex-shrink-0 w-full gap-5" x-show="imagePreviews.length > 0">
        <template x-for="(image, index) in imagePreviews" :key="index">
            <div class="w-28 h-28">
                <img :src="image" alt="Image Preview" class="w-full h-full object-cover rounded-md" />
            </div>
        </template>
    </div>
</label>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageUpload', () => ({
            imagePreviews: [],

            previewImages(event) {
                const files = event.target.files;
                this.imagePreviews = [];

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    const reader = new FileReader();

                    reader.onload = (e) => {
                        this.imagePreviews.push(e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        }))
    })
</script>