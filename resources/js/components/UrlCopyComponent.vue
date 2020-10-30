<template>
    <div>
        <input id="copyTarget" type="hidden" v-model="url" readonly class="col-10">
        <button type="button" class="btn btn-primary text-white font-bold py-2 px-4 rounded-full" @click="urlCopy()" data-toggle="tooltip" data-placement="top">
            URLをコピー
        </button>
    </div>
</template>

<script>
    export default {
        mounted() {
            const url = location.href;
            this.url = url;
        },
        data() {
            return {
                url: ''
            }
        },
        methods: {
            urlCopy() {
                const hideInput = document.getElementById("copyTarget");
                const newInput = document.createElement("input");
                newInput.type ="text";
                newInput.style.option = "absolute";
                newInput.style.merginLeft = "200vw";
                hideInput.parentNode.insertBefore(newInput, hideInput.nextSibling);
                newInput.value = hideInput.value;

                newInput.focus();
                newInput.setSelectionRange(0, newInput.value.length);

                // 選択範囲をコピー
                document.execCommand('copy');
                window.getSelection().collapse(document.body, 0);

                // 選択を解除
                const active_element = document.activeElement;
                if(active_element){
                    active_element.blur();
                }

                // 作ったinput要素を消す
                newInput.parentNode.removeChild(newInput);
                alert("コピーが完了しました。");
            }
        }
    }
</script>
