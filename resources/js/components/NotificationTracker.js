const notificationTracker = () => {
    return {
        message : '',
        open : false,
        timer : null,
        type : null,
        handleOpenEvent($event) {

            if (this.open) {
                this.open  = false
                this.timer = null
            }

            this.message = $event.detail.message
            this.type = $event.detail.type

            setTimeout(()=>{
                this.open  = true;
                this.timer = setTimeout(()=>{
                    this.open = false
                },3000)
            },50)
        },
        getBorderColor() {
            return (this.type === 'success' && 'border-green-500')
                || (this.type === 'error' && 'border-red-500')
        },
        getTextColor() {
            return (this.type === 'success' && 'text-green-500')
                || (this.type === 'error' && 'text-red-500')
        },
        getBackgroundColor() {
            return (this.type === 'success' && 'bg-green-500')
                || (this.type === 'error' && 'bg-red-500')
        }

    }

}

export default notificationTracker;