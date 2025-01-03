<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *::before,
        *::after,
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f5f9;
            color: #334155;
            padding-block: 50px !important;
            font-size: 16px;
            line-height: 24px;
        }

        .mail-wrapper {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        .mail-header {
            background-color: rgb(255, 166, 0);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-block: 40px;
        }

        .mail-header .svg-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 0;
        }

        .mail-header .svg-container::before {
            content: '';
            inset: 0;
            width: 100px;
            height: 100px;
            background-color: rgb(248, 202, 117);
            border-radius: 100%;
            position: absolute;
            z-index: -10;
        }

        .mail-header .svg-container svg {
            width: 100px;
            height: 100px;
        }

        .mail-header h5 {
            font-size: 20px;
            line-height: 28px;
            margin-top: 12px;
            color: white;
        }

        .mail-header p {
            font-size: 16px;
            line-height: 24px;
            color: white;
        }

        .mail-body {
            padding: 36px;
            font-weight: 500;
            color: #334155;
        }

        .main-title {
            font-size: 18px;
            line-height: 28px;
            font-weight: 600;
        }

        .subtitle {
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
        }

        .body-title p:nth-child(1) {
            font-size: 18px;
            line-height: 28px;
            font-weight: 600;
        }

        .body-title {
            margin-bottom: 24px;
        }

        .item-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 14px;
        }

        .item-image {
            width: 72px;
            height: 80px;
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-position: center;
            object-fit: cover;
        }

        .item-price {
            margin-left: auto;
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex-shrink: 0;
            min-width: 100px;

        }

        .item-price p {
            color: orange;
        }

        .item-price .product-total {
            justify-self: flex-end;
        }

        .discount-wrapper {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .discount-percent {
            padding-inline: 12px;
            padding-block: 3px;
            font-size: 14px;
            line-height: 16px;
            font-weight: 500px;
            background-color: #ffedd5;
            color: #f97316;
            border-radius: 5px;
        }

        .price_before_discount {
            text-decoration: line-through;
        }


        .items-total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 24px;
        }

        .items-total div {
            display: grid;
            column-gap: 14px;
            row-gap: 5px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .items-total div .total {
            font-weight: 600;
        }

        .mail-footer {
            border-top: 1px solid #cbd5e1;
            padding: 20px;
        }

        .mail-footer .signature {
            margin-block: 20px;
        }

        a {
            color: orange;
        }
    </style>
</head>


<body>
    <main>
        <div class="mail-wrapper">
            <div class="mail-header">
                <div class="svg-container">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="-0 0 100 100">
                        <path
                            d="m41.441 73.488c-3.1094 0-5.6406 2.5312-5.6406 5.6406s2.5312 5.6406 5.6406 5.6406 5.6406-2.5312 5.6406-5.6406c-0.003906-3.1094-2.5312-5.6406-5.6406-5.6406zm0 10.281c-2.5586 0-4.6406-2.0781-4.6406-4.6406 0-2.5586 2.0781-4.6406 4.6406-4.6406 2.5586 0 4.6406 2.0781 4.6406 4.6406-0.003906 2.5625-2.0938 4.6406-4.6406 4.6406z" />
                        <path
                            d="m41.441 76.48c-1.4609 0-2.6484 1.1914-2.6484 2.6484 0 1.4609 1.1914 2.6484 2.6484 2.6484 1.4609 0 2.6484-1.1914 2.6484-2.6484 0-1.457-1.1914-2.6484-2.6484-2.6484zm0 4.3008c-0.91016 0-1.6484-0.73828-1.6484-1.6484 0-0.91016 0.73828-1.6484 1.6484-1.6484s1.6484 0.73828 1.6484 1.6484c0 0.90625-0.73828 1.6484-1.6484 1.6484z" />
                        <path
                            d="m70.449 73.488c-3.1094 0-5.6406 2.5312-5.6406 5.6406s2.5312 5.6406 5.6406 5.6406 5.6406-2.5312 5.6406-5.6406-2.5312-5.6406-5.6406-5.6406zm0 10.281c-2.5586 0-4.6406-2.0781-4.6406-4.6406 0-2.5586 2.0781-4.6406 4.6406-4.6406 2.5586 0 4.6406 2.0781 4.6406 4.6406s-2.0781 4.6406-4.6406 4.6406z" />
                        <path
                            d="m70.449 76.48c-1.4609 0-2.6484 1.1914-2.6484 2.6484 0 1.4609 1.1914 2.6484 2.6484 2.6484 1.4609 0 2.6484-1.1914 2.6484-2.6484 0.003906-1.457-1.1758-2.6484-2.6484-2.6484zm0 4.3008c-0.91016 0-1.6484-0.73828-1.6484-1.6484 0-0.91016 0.73828-1.6484 1.6484-1.6484 0.91016 0 1.6484 0.73828 1.6484 1.6484 0.003906 0.90625-0.72656 1.6484-1.6484 1.6484z" />
                        <path
                            d="m87.66 40.949h-9.7305c-0.28125 0-0.5 0.21875-0.5 0.5v2.8398c0 0.28125 0.21875 0.5 0.5 0.5h7.1211l-1.6016 5.1016h-6.9297v-21.422h0.69922c0.67188 0 1.2109-0.53906 1.2109-1.2109v-5.7617c0-1.4609-1.1914-2.6484-2.6484-2.6484h-6.2617c-0.85938-2.5898-3.6016-4.1406-6.2891-3.4492l-2.8789 0.71875c-0.19141-0.26953-0.5-0.46094-0.85156-0.46094h-3.3906c-0.35938 0-0.66016 0.19141-0.85156 0.46875l-2.8789-0.73047c-1.3711-0.35156-2.7891-0.14062-4 0.58984-1.0898 0.64844-1.8789 1.6719-2.2812 2.8594h-6.2695c-1.4609 0-2.6484 1.1914-2.6484 2.6484v5.7617c0 0.67188 0.55078 1.2188 1.2188 1.2188h0.69922v21.422h-5.7812c-0.28125 0-0.5 0.21875-0.5 0.5v2.8398c0 0.28125 0.21875 0.5 0.5 0.5h48.91l-1.8281 5.8203-44.129 0.003906c-0.28125 0-0.5 0.21875-0.5 0.5v2.8398c0 0.28125 0.21875 0.5 0.5 0.5h42.93l-1.5 4.7812h-43.289l-9.9492-34.41c-0.25-0.82031-0.98828-1.3789-1.8398-1.3789h-11.699c-0.28125 0-0.5 0.21875-0.5 0.5v2.8398c0 0.28125 0.21875 0.5 0.5 0.5h10.25l9.9609 34.398c0.23047 0.82812 0.96875 1.3906 1.8398 1.3906h47.191c0.21875 0 0.41016-0.14062 0.48047-0.35156l8.8789-28.23c0.17187-0.60156 0.058593-1.2305-0.28906-1.6992-0.375-0.5-0.95312-0.78906-1.5742-0.78906zm-18.52-21.098h0.019531 0.011719 6.6094c0.91016 0 1.6484 0.73828 1.6484 1.6484v5.7617c0 0.12109-0.10156 0.21094-0.21094 0.21094h-8.0703-0.011719-0.82031c-1.1406-4.0508-2.7617-6.3203-3.6406-7.3086 1.4844-0.20312 2.9727-0.3125 4.4648-0.3125zm-12.859 20.508h-0.011719-0.011719-16.148v-1.6094h35.398v1.6094h-16.137-0.011719-0.011719zm2.5781 1v8.1914h-2.0898v-8.1914zm-11.961-10.84c0.16016 0.10938 0.35937 0.12891 0.53125 0.03125l1.9492-1.0703 1.0703 1.9414c0.089843 0.16016 0.26172 0.26172 0.44141 0.26172h0.070313c0.21094-0.03125 0.37109-0.19141 0.42187-0.39062 0.011719-0.03125 0.26172-1.1797 0.82813-2.8203h3.5703v9.2695l-15.672-0.003907v-9.2695h6.9297c-0.12109 0.48828-0.23047 1-0.33984 1.5508-0.027344 0.19141 0.039062 0.37891 0.19922 0.5zm1-1.3711c1.3398-5.9414 3.8789-8.4688 4.2383-8.8086 0.78906 0.14062 1.5781 0.30078 2.3711 0.48828l0.46094 0.12109c-2.3906 3.1094-3.6992 6.9414-4.25 8.8789l-0.69922-1.2695c-0.12891-0.23828-0.44141-0.32812-0.67969-0.19922zm7.8711 12.211v8.5391h-15.66v-8.5391zm1-3.6211v-9.2695h2.0898v9.2695zm3.0898 3.6211h15.66v8.5391h-15.66zm0-3.6211v-9.2695h3.5703c0.57031 1.6289 0.82812 2.8086 0.82812 2.8203 0.039063 0.19922 0.21094 0.35938 0.42188 0.39063h0.070312c0.17969 0 0.35156-0.10156 0.44141-0.26172l1.0703-1.9492 1.9492 1.0703c0.17187 0.089844 0.37891 0.078126 0.53125-0.03125 0.14844-0.10937 0.23047-0.30859 0.19922-0.5-0.10156-0.51953-0.23047-1.0312-0.35156-1.5508h6.9492v9.2695l-15.68 0.003907zm0.80078-16.777 0.46094-0.12109c0.78125-0.19922 1.5703-0.35156 2.3594-0.48828 0.32031 0.30078 2.6016 2.5508 3.9805 7.75 0.089843 0.35156 0.17969 0.69922 0.26172 1.0508l-1.4297-0.78906c-0.23828-0.12891-0.53906-0.039062-0.67969 0.19922l-0.69922 1.2812c-0.16016-0.55078-0.37109-1.25-0.66016-2.0391-0.68359-1.8828-1.8438-4.5742-3.5938-6.8438zm2.8203-4.6016c2.0781-0.51953 4.1797 0.57812 4.9883 2.4883-2.5586 0.050782-5.1094 0.39062-7.5898 1.0195l-0.30859 0.078124v-2.8516zm-7.3594 0.30078h3.3906c0.03125 0 0.070312 0.03125 0.070312 0.050782v3.8789l-0.070312 0.33984-3.4609-0.058594v-4.1328c0-0.046875 0.039063-0.078125 0.070313-0.078125zm-0.51953 5.1211c0.16016 0.089844 0.32813 0.14844 0.51953 0.14844h3.3906c0.19141 0 0.35938-0.058594 0.51953-0.14844 1.3906 1.8711 2.3789 4 3.0312 5.6914l-10.492-0.003906c0.66797-1.7578 1.6602-3.8594 3.0312-5.6875zm-6.7031-4.9414c0.98047-0.58984 2.1289-0.76172 3.2383-0.48047l2.9102 0.73047v2.8516l-0.28906-0.070312c-2.4805-0.62891-5.0312-0.94922-7.5898-1.0117 0.34375-0.82812 0.94141-1.5391 1.7305-2.0195zm-10.488 10.629c-0.12109 0-0.21875-0.10156-0.21875-0.21875v-5.7617c0-0.91016 0.73828-1.6484 1.6484-1.6484h6.6406c1.4883 0 2.9805 0.10938 4.4492 0.30859-0.87109 1-2.5 3.2695-3.6406 7.3086h-0.80859-0.011719l-8.0586 0.003907zm50.141 15.68-8.7695 27.871h-46.82c-0.42188 0-0.76953-0.26172-0.87891-0.66016l-10.07-34.77c-0.058594-0.21094-0.26172-0.35938-0.48047-0.35938h-10.121v-1.8398h11.199c0.41016 0 0.76172 0.26953 0.87891 0.66016l10.051 34.762c0.058594 0.21094 0.26172 0.35938 0.48047 0.35938h44.039c0.21875 0 0.41016-0.14062 0.48047-0.35156l1.8203-5.7812c0.050781-0.14844 0.019531-0.32031-0.070313-0.44922-0.089843-0.12891-0.23828-0.19922-0.39844-0.19922h-43.121v-1.8398h44c0.21875 0 0.41016-0.14062 0.48047-0.35156l2.1484-6.8203c0.050781-0.14844 0.019531-0.32031-0.070313-0.44922-0.089844-0.12891-0.23828-0.19922-0.39844-0.19922h-49.102v-1.8398h49.988c0.21875 0 0.41016-0.14062 0.48047-0.35156l1.9219-6.1016c0.050781-0.14844 0.019531-0.32031-0.070312-0.44922-0.089844-0.12891-0.23828-0.19922-0.39844-0.19922h-7.3008v-1.8398h9.2305c0.30078 0 0.57031 0.14062 0.75 0.37891l0.011718 0.011719c0.13672 0.21875 0.1875 0.51953 0.10938 0.80859z" />
                    </svg>
                </div>
                <h5>Order Received!</h5>
                <p> ORDER NO: {{ $order->order_number }}</p>
            </div>

            <div class="mail-body">
                <div class="body-title">
                    <p>{{ $customerName }}, we received your order.</p>
                    <p>
                        Thank you for your order! 🎉
                    </p>

                    <p>We’ve received your order and are processing it now. You’ll receive another update once your
                        items are shipped.</p>
                </div>

                <div class="order-items">
                    <p class="subtitle">Items in the Order </p>


                    <div class="item-list">
                        @foreach ($order->products as $product)
                            <div class="item">
                                <div class="item-image">
                                    <img src="{{ $product->oldestImage->url }}" alt="{{ $product->name }}">
                                </div>
                                <div class="item-desc">
                                    <p>{{ $product->name }}</p>
                                    <p>Items: {{ $product->pivot->quantity }}</p>
                                </div>

                                <!-- product prices -->
                                <div class="item-price">
                                    <p>${{ $product->pivot->price - $product->pivot->discount }}</p>

                                    @if ($product->pivot->discount && $product->pivot->discount != 0)
                                        <div class="discount-wrapper">
                                            <span class="price_before_discount">${{ $product->pivot->price }}</span>
                                            <span
                                                class="discount-percent">{{ number_format(-($product->pivot->discount * 100) / $product->pivot->price, 2) }}</span>
                                        </div>
                                    @endif

                                    <div class="product-total">
                                        <span>Total:</span>
                                        <span>{{ $product->pivot->items_total - $product->pivot->items_discount }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="items-total">
                        <div>
                            <span>Sub Total</span>
                            <span>${{ $order->sub_total }}</span>
                            <span>Discount</span>
                            <span>${{ $order->total_discount }}</span>
                            <span>Delivery Charge</span>
                            <span>$00.00</span>
                            <span>Tax</span>
                            <span>$00.00</span>
                            <span class="total">Total</span>
                            <span class="total">{{ number_format($order->total, 2) }}</span>
                        </div>
                        <div class="total">
                        </div>

                    </div>
                </div>
            </div>
            <div class="mail-footer">
                <p>If you decide to cancel your order, sign in to <a href="">My Accout</a> to proceed</p>

                <div class="signature">
                    <p>Thanks</p>
                    <p>Your Team</p>
                </div>

                <p>Any questions? Get in touch by <a href="">Email</a> or take a look at our <a
                        href="">Help Pages</a>.</p>
            </div>
        </div>
    </main>
</body>

</html>
