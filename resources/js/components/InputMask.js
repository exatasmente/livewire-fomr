import Inputmask from "inputmask/lib/inputmask";

const inputMask = function(mask) {
    return {
        init(value) {
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

        },
    }
}

export default inputMask