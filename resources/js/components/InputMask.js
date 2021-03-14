import Inputmask from "inputmask/lib/inputmask";

const inputMask = function(mask, {callback}) {
    return {
        timer: null,
        value : null,
        callback: callback,
        init() {
            const self = this;
            Inputmask(mask,{
                rightAlign: false,
                autoUnmask: true,
                clearIncomplete: false,
                onBeforeMask(value, opts) {
                    if(null === value){
                        value = ' '
                    }
                    return value;
                },
            }).mask(self.$el)

            self.$el.addEventListener('change', (e) => {
                this.timer = setTimeout(()=>{
                    const val = self.$el.inputmask.unmaskedvalue()
                    self.callback(val);
                },100);
            })
        },
    }
}

export default inputMask