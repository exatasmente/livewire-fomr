import Inputmask from "inputmask/lib/inputmask";

const inputMask = function(mask, input) {
    return {
        input : input,
        time : null,
        init() {
            Inputmask(mask,{
                rightAlign: false,
                autoUnmask: true,
                onBeforeMask: function (value, opts) {
                    if(null === value){
                        value= ' '
                    }
                    return value;
                }
            }).mask(this.$el)
            const self = this.$el;
            this.$el.addEventListener('change', function(event) {
                const inputEvent = new CustomEvent('input', {detail:event.target.value});
                this.timer = setTimeout(()=>{
                    self.dispatchEvent(inputEvent);
                },200);
            })
        },
    }
}

export default inputMask