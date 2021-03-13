

<div>
    <div  x-cloak
          wire:ignore
          x-data="notificationTracker()"
          x-click.away="open = false"
          class="fixed inset-0 flex items-end justify-center px-4 py-6 mt-10 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-40"
          x-show="open"
          @open-notification.window="handleOpenEvent"
          x-transition:enter="transition ease-out duration-100 transform"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75 transform"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto border" x-class="getBorderColor()">
            <div class="rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">

                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="mt-1 text-sm leading-5 text-gray-500" x-text="message"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button x-on:click="open = false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@once
    @push('script')
        <script type="text/javascript" defer>
            const notificationTracker = function() {
                return {
                    message : '',
                    open : false,
                    timer : null,
                    type : null,
                    handleOpenEvent : function($event) {
                        if (this.open) {
                            this.open  = false;
                            this.timer = null;
                        }

                        this.message = $event.detail.message
                        this.type = $event.detail.type

                        setTimeout(()=>{
                            this.open  = true;
                            this.timer = setTimeout(()=>{
                                this.open = false
                            },3000)
                        },250)
                    },
                    getBorderColor : function () {
                        return (this.type === 'success' & 'border-red-500')
                               || (this.type === 'error' & 'border-green-500');
                    },
                    getTextColor : function () {
                        return (this.type === 'success' & 'text-red-500')
                            || (this.type === 'error' & 'text-green-500');
                    },

                }

            }
        </script>
    @endpush
@endonce

