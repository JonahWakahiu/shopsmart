<x-app-layout>
    <div class="py-12" x-data="createProduct">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- alert --}}
            <div x-cloak x-show="successMessage"
                class="relative w-full overflow-hidden rounded-xl border border-green-600 bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300 mb-5">
                <div class="flex w-full items-center gap-2 bg-green-600/10 px-4 py-2">
                    <div class="bg-green-600/15 text-green-600 rounded-full p-1" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        <p class="text-xs font-medium sm:text-sm" x-text="successMessage"></p>
                    </div>
                    <button class="ml-auto" @click="successMessage = ''">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <form @submit.prevent="addProduct($event)">
                <div class="flex items-center mb-4">
                    <h6 class="font-semibold text-2xl text-black dark:text-white">Add a new Product</h6>

                    <div class="ms-auto flex items-center gap-3">
                        <button type="reset"
                            class="bg-red-500 text-white py-2 px-5 rounded-md hover:bg-red-500/80 text-sm font-medium">Discard</button>

                        <button type="submit"
                            class="flex items-center space-x-2 py-2 px-5 rounded-md bg-blue-500 hover:bg-blue-500/80 text-white text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-floppy size-5"
                                viewBox="0 0 16 16">
                                <path d="M11 2H9v3h2z" />
                                <path
                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                            </svg>
                            <span>
                                Save Draft
                            </span>
                        </button>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
                    <div class="md:col-span-4 space-y-10">

                        <div class="bg-white dark:bg-slate-800 rounded-md p-5 space-y-4">
                            <p class="text-xl font-medium">Product Information</p>

                            <div>
                                <x-input-label for="name" :value="_('Name')" />
                                <x-text-input class="w-full" name="name" id="name"
                                    placeholder="e.g., Samsung Galaxy Tab S9" />

                                <template x-if="errors.name">
                                    <template x-for="error in errors.name" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <x-input-label for="sku" :value="_('SKU')" />
                                    <x-text-input class="w-full" name="sku" id="sku"
                                        placeholder="e.g., APL-IPH15PRO-256GB-BL" />

                                    <template x-if="errors.sku">
                                        <template x-for="error in errors.sku" :key="error">
                                            <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                        </template>
                                    </template>
                                </div>

                                <div>
                                    <x-input-label for="barcode" :value="_('Barcode')" />
                                    <x-text-input class="w-full" name="barcode" id="barcode"
                                        placeholder="e.g., 012345678905" />

                                    <template x-if="errors.barcode">
                                        <template x-for="error in errors.barcode" :key="error">
                                            <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                        </template>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <x-input-label for="short_description" :value="_('Short Description')" />
                                <x-textarea-input id="short_description" name="short_description"
                                    class="w-full min-h-28"
                                    placeholder="A powerful smartphone with cutting-edge features for seamless multitasking." />

                                <template x-if="errors.short_description">
                                    <template x-for="error in errors.short_description" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <div>
                                <x-input-label for="description" :value="_('Description')" />
                                <div x-data="richTextEditor">
                                    <x-rich-textarea class="w-full" name="description" :placeholder="'Product Description'" />
                                </div>

                                <template x-if="errors.description">
                                    <template x-for="error in errors.description" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>
                        </div>

                        {{-- product images --}}
                        <div class="bg-white rounded-md p-5 space-y-4">
                            <div class="flex items-center justify-between">
                                <p class="text-xl font-medium">Product Image</p>

                                <button type="button" x-cloak x-show="addFiles === 'local'" @click="addFiles = 'url'"
                                    class="text-blue-500">Add Media from
                                    Url</button>

                                <button type="button" x-cloak x-show="addFiles === 'url'" @click="addFiles = 'local'"
                                    class="text-blue-500">Add Media from Local
                                    Storage</button>
                            </div>

                            <template x-if="addFiles === 'local'">
                                <div>
                                    <label for="imageUploads"
                                        class="cursor-pointer relative flex w-full min-h-48 flex-col items-center justify-center gap-2 rounded-md border border-dashed border-slate-300 p-8 text-slate-700 dark:border-slate-700 dark:text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            aria-hidden="true" fill="currentColor" class="w-12 h-12 opacity-75">
                                            <path fill-rule="evenodd" d=" M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5
                                4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03
                                5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5
                                0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                                        </svg>

                                        <div class="group">
                                            <span
                                                class="cursor-pointer font-medium text-blue-700 group-focus-within:underline dark:text-blue-600">
                                                <input type="file" class="hidden" x-ref="fileInput" multiple
                                                    name="images[]" @change="previewImages($event)"
                                                    id="imageUploads">
                                                Browse</span>
                                            or drag and drop here
                                        </div>
                                        <small id="validFileFormats">PNG, JPG, WebP - Max 5MB</small>

                                        <div class=" mt-4 flex flex-wrap flex-shrink-0 w-full gap-5"
                                            x-show="imagePreviews.length > 0">
                                            <template x-for="(image, index) in imagePreviews" :key="index">
                                                <div class="w-28 h-28">
                                                    <img :src="image" alt="Image Preview"
                                                        class="w-full h-full object-cover rounded-md" />
                                                </div>
                                            </template>
                                        </div>
                                    </label>

                                    <template x-if="errors.images">
                                        <template x-for="error in errors.images" :key="error">
                                            <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                        </template>
                                    </template>
                                </div>
                            </template>

                            <template x-if="addFiles === 'url'">
                                <div class="space-y-4">
                                    <template x-for="(field, index) in imageUrlFields" :key="index">
                                        <div class="flex items-end w-full gap-5">
                                            <div class="w-full max-w-sm">
                                                <x-input-label ::for="'image_urls[' + index + ']'" :value="_('Image Url')" />
                                                <x-text-input ::id="'image_urls[' + index + ']'" x-model="field.url" class="w-full"
                                                    placeholder="e.g., https://example.com/image.jpg" />
                                            </div>
                                            <button @click="removeField(index)"
                                                class="bg-slate-100 rounded shadow-md p-1.5 text-red-500 mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>

                                    <button type="button" @click="addField"
                                        class="bg-blue-500 text-white rounded-md py-1.5 px-5 hover:bg-blue-500/80 capitalize">
                                        add url
                                    </button>
                                </div>
                            </template>

                        </div>

                        <div class="bg-white rounded-md p-5 space-y-4">
                            <p class="text-xl font-medium">Variants</p>

                            <template x-for="(field, index) in fields" :key="index">
                                <div class="space-y-4 border rounded-lg p-4 bg-slate-50">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                        <div>
                                            <x-input-label for="'variations[' + index + '][type]'" :value="_('Variation Type')" />
                                            <x-text-input ::name="'variations[' + index + '][type]'" id="'variations[' + index + '][type]'"
                                                placeholder="e.g., Size" class="w-full" />

                                            <template x-if="errors[`variations.${index}.type`]">
                                                <template x-for="error in errors[`variations.${index}.type`]"
                                                    :key="error">
                                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2"
                                                        x-text="error"></p>
                                                </template>
                                            </template>
                                        </div>

                                        <div>
                                            <x-input-label for="'variations[' + index + '][value]'"
                                                :value="_('Variation Value')" />
                                            <x-text-input ::name="'variations[' + index + '][value]'" id="'variations[' + index + '][value]'"
                                                placeholder="e.g., Medium" class="w-full" />

                                            <template x-if="errors[`variations.${index}.value`]">
                                                <template x-for="error in errors[`variations.${index}.value`]"
                                                    :key="error">
                                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2"
                                                        x-text="error"></p>
                                                </template>
                                            </template>
                                        </div>

                                        <div>
                                            <x-input-label for="'variations[' + index + '][price]'"
                                                :value="_('Variation Price')" />
                                            <x-text-input ::name="'variations[' + index + '][price]'" id="'variations[' + index + '][price]'"
                                                placeholder="e.g., 15.99" class="w-full" />

                                            <template x-if="errors[`variations.${index}.price`]">
                                                <template x-for="error in errors[`variations.${index}.price`]"
                                                    :key="error">
                                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2"
                                                        x-text="error"></p>
                                                </template>
                                            </template>
                                        </div>

                                        <div>
                                            <x-input-label for="'variations[' + index + '][stock_quantity]'"
                                                :value="_('Variation Stock Quantity')" />
                                            <x-text-input ::name="'variations[' + index + '][stock_quantity]'"
                                                id="'variations[' + index + '][stock_quantity]'"
                                                placeholder="e.g., 100" class="w-full" />

                                            <template x-if="errors[`variations.${index}.stock_quantity`]">
                                                <template x-for="error in errors[`variations.${index}.stock_quantity`]"
                                                    :key="error">
                                                    <p class="text-sm text-red-600 dark:text-red-400 mt-2"
                                                        x-text="error"></p>
                                                </template>
                                            </template>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" @click="fields.splice(index, 1)"
                                            class="w-full sm:w-auto px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md shadow-sm hover:bg-red-600">Remove
                                            Variation</button>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="fields.push(fields.length)"
                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-600">Add
                                Variation</button>
                        </div>


                        <div class="bg-white rounded-md p-5 space-y-4">
                            <p class="text-xl font-medium">Inventory</p>

                            <div class="grid grid-cols-3 divide-x divide-slate-300">
                                <div class="col-span-1 px-4">
                                    <button type="button"
                                        class="py-2 text-sm px-3 bg-blue-500 w-full text-white rounded-md flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                            <path
                                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                        </svg>

                                        <span>Restock</span>
                                    </button>
                                </div>
                                <div class="col-span-2 px-5">
                                    <p class="text-sm text-slate-700">Options</p>

                                    <div class="mt-4">
                                        <x-input-label for="stock_quantity" :value="_('Add to Stock')" />
                                        <x-text-input id="stock_quantity" name="stock_quantity"
                                            placeholder="Quantity" type="number" min="1" class="w-full" />

                                        <template x-if="errors.stock_quantity">
                                            <template x-for="error in errors.stock_quantity" :key="error">
                                                <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error">
                                                </p>
                                            </template>
                                        </template>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="md:col-span-2 space-y-10">

                        <div class="bg-white rounded-md p-5 space-y-4">
                            <p class="text-xl font-medium">Pricing</p>

                            <div>
                                <x-input-label for="price" :value="_('Base Price')" />
                                <x-text-input class="w-full" id="price" name="price"
                                    placeholder="e.g., 200" />

                                <template x-if="errors.price">
                                    <template x-for="error in errors.price" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <div>
                                <x-input-label for="discount" :value="_('Discount')" />
                                <x-text-input class="w-full" id="name" name="discount"
                                    placeholder="e.g., 10" />

                                <template x-if="errors.discount">
                                    <template x-for="error in errors.discount" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <div class="flex items-center space-x-2">
                                <x-checkbox-input id="change_tax" name="change_tax" />
                                <x-input-label for="change_tax" :value="_('Change tax on this product')" />
                            </div>

                            <div class="border-b border-slate-300"></div>

                            <div class="flex items-center justify-between">
                                <x-input-label for="in_stock" :value="_('In Stock')" />
                                <x-toggle id="in_stock" name="in_stock" />
                            </div>
                        </div>

                        <div class="bg-white rounded-md p-5 space-y-4">
                            <p class="text-xl font-medium">Organize</p>

                            <div>
                                <x-input-label for="category" :value="_('Category')" />
                                <x-select-input class="w-full" id="category" name="category">
                                    <option value="" selected>Category</option>
                                    <template x-for="category in categories" :key="category">
                                        <option :value="category" x-text="category"></option>
                                    </template>
                                </x-select-input>

                                <template x-if="errors.category">
                                    <template x-for="error in errors.category" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <div>
                                <x-input-label for="status" :value="_('Status')" />
                                <x-select-input id="status" class="w-full capitalize" name="status"
                                    x-model="status">
                                    <option value="" selected>Status</option>
                                    <template x-for="status in ['publish', 'shedule', 'inactive' ]"
                                        :key="status">
                                        <option :value="status" x-text="status"></option>
                                    </template>
                                </x-select-input>

                                <template x-if="errors.status">
                                    <template x-for="error in errors.status" :key="error">
                                        <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                    </template>
                                </template>
                            </div>

                            <template x-if="status === 'shedule'">
                                <div>
                                    <x-input-label for="publish_on" :value="_('Publish On')" />
                                    <x-flatpicker id="publish_on" name="publish_on" />

                                    <template x-if="errors.publish_on">
                                        <template x-for="error in errors.publish_on" :key="error">
                                            <p class="text-sm text-red-600 dark:text-red-400 mt-2" x-text="error"></p>
                                        </template>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('createProduct', function() {
                    return {
                        categories: {},
                        status: '',
                        fields: [0],
                        errors: {},
                        successMessage: '',
                        imagePreviews: [],

                        addFiles: this.$persist('local'),
                        imageUrlFields: [{
                            url: '',
                        }],

                        addField() {
                            this.imageUrlFields.push('');
                        },

                        removeField(index) {
                            this.imageUrlFields.splice(index, 1);
                        },

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
                        },

                        async addProduct(event) {
                            try {
                                this.errors = {};
                                const formData = new FormData(event.target);

                                event.target.querySelectorAll('input[type="checkbox"]').forEach((
                                    checkbox) => {
                                    formData.set(checkbox.name, checkbox.checked ? '1' : '0');
                                });

                                const imageUrls = this.imageUrlFields.map(field => field.url);

                                if (imageUrls.length > 0 && imageUrls != '') {
                                    imageUrls.forEach(url => {
                                        formData.append('image_urls[]', url);
                                    });
                                }

                                const response = await axios.post('{{ route('admin.products.store') }}',
                                    formData);

                                if (response.status === 200) {
                                    event.target.reset();
                                    this.imagePreviews = [];
                                    this.fields = [0];

                                    this.$dispatch('notify', {
                                        message: response.data.message,
                                        type: 'success',
                                        duration: 4000,
                                    });

                                }
                            } catch (error) {
                                if (error.response && error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                }

                                this.$dispatch('notify', {
                                    message: error.response.data.message,
                                    type: 'error',
                                    duration: 4000,
                                });
                            }
                        },

                        init() {
                            this.categories = @json($categoryNames);
                        }
                    }
                })
            })
        </script>
    @endpush
</x-app-layout>
