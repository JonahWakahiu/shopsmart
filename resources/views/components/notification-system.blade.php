<div x-data="notificationSystem"
    @notify.window="addNotification({message: $event.detail.message, type: $event.detail.type, duration: $event.detail.duration})"
    class="fixed top-4 right-4 space-y-4" style="z-index: 1000">
    <!-- Notification Template -->
    <template x-for="(notification, index) in notifications" :key="index">
        <div x-show="notification.show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2" @click="remove(index)"
            class="px-4 py-2 rounded shadow text-white"
            :class="{
                'bg-green-500': notification.type === 'success',
                'bg-red-500': notification.type === 'error',
                'bg-blue-500': notification.type === 'info',
            }">
            <p x-text="notification.message"></p>
        </div>
    </template>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('notificationSystem', () => ({
                notifications: [],

                addNotification({
                    message,
                    type = 'info',
                    duration = 3000
                }) {
                    const notification = {
                        message,
                        type,
                        show: true
                    };
                    this.notifications.push(notification);

                    // Automatically remove the notification after the specified duration
                    setTimeout(() => {
                        notification.show = false;
                        setTimeout(() => this.notifications.splice(this.notifications.indexOf(
                            notification), 1), 300);
                    }, duration);
                },

                remove(index) {
                    this.notifications.splice(index, 1);
                },
            }));
        });
    </script>
@endpush
