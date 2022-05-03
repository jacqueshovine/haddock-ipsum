
document.addEventListener('alpine:init', () => {

    Alpine.data('copy_button', () => ({
        open: false,

        copy: {
            ['x-on:click']() {

                this.open = !this.open
                
                setTimeout(() => {
                    this.open = !this.open
                }, 2000)

                let text = document.getElementById('paragraphs').textContent.trim()

                return subject => navigator.clipboard.writeText(text)
            },
        },
     
        toast: {
            ['x-show']() {
                return this.open
            },
        },
    }))
})
