import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist';
import focus from '@alpinejs/focus';
import Quill from 'quill';
import Swiper from 'swiper/bundle';

import "quill/dist/quill.core.css";
import 'swiper/css/bundle';

// Initialize global libraries if needed globally
window.Alpine = Alpine;
window.Quill = Quill;
window.Swiper = Swiper;

// Register Alpine.js plugins
Alpine.plugin(collapse);
Alpine.plugin(focus);
Alpine.plugin(persist);



document.addEventListener('alpine:init', () => {
    Alpine.store('cart', {
        products: Alpine.$persist([]).as('cart-products'),

        get count() {
            return this.products.reduce((total, product) => total + product.userSelectedQuantity, 0);
        },

        get subTotal() {
            const subTotal = this.products.reduce((total, product) => total + (product.price * product.userSelectedQuantity), 0);
            return subTotal.toFixed(2);
        },

        get totalDiscount() {
            const discount = this.products.reduce((total, product) => total + (product.discount * product.userSelectedQuantity), 0);
            return -discount.toFixed(2);
        },

        get total() {
            const total = this.products.reduce((total, product) => total + ((product.price - product.discount) * product.userSelectedQuantity), 0);
            return total.toFixed(2);
        },


        addProduct(product) {
            const productKey = `${product.id}-${product.variation_id || ''}`;


            const existingProduct = this.products.find(item => item.product_key === productKey);
            debugger;

            if (existingProduct) {
                if (existingProduct.variation_id) {
                    existingProduct.userSelectedQuantity++;
                } else {
                    existingProduct.userSelectedQuantity += product.userSelectedQuantity;
                }

                this.dispatchEvent('notify', { message: 'Product quantity updated in the cart!', type: 'success', duration: 4000 });
            } else {
                this.products.push({ ...product, product_key: productKey });
                this.dispatchEvent('notify', { message: 'Product added to the cart!', type: 'success', duration: 4000 });
            }
        },

        increaseUserSelectedQuantity(productId, variationId = '') {
            const productKey = `${productId}-${variationId}`;

            const existingProduct = this.products.find(item => item.product_key === productKey);
            if (existingProduct && existingProduct.userSelectedQuantity < existingProduct.stock_quantity) {
                existingProduct.userSelectedQuantity++;
            }
            this.dispatchEvent('notify', { message: 'Product quantity updated in the cart!', type: 'success', duration: 4000 });
        },

        decreaseUserSelectedQuantity(productId, variationId = '') {
            const productKey = `${productId}-${variationId}`;

            const existingProduct = this.products.find(item => item.product_key === productKey);
            if (existingProduct && existingProduct.userSelectedQuantity > 1) {
                existingProduct.userSelectedQuantity--;
            }
            this.dispatchEvent('notify', { message: 'Product quantity updated in the cart!', type: 'success', duration: 4000 });
        },

        removeProduct(productId, variationId = '') {
            const productKey = `${productId}-${variationId}`;

            const existingProduct = this.products.find(item => item.product_key === productKey);

            if (existingProduct) {

                this.products = this.products.filter(item => item.product_key !== productKey);

                this.dispatchEvent('notify', { message: 'Product removed from the cart!', type: 'success', duration: 4000 });
            }
        },

        clearCart() {
            this.products = [];
        },

        dispatchEvent(eventName, detail) {
            window.dispatchEvent(new CustomEvent(eventName, { detail }));
        },
    });
});

// Initialize Alpine.js
Alpine.start();
