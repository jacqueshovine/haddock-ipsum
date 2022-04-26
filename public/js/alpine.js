
document.addEventListener('alpine:init', () => {

    Alpine.magic('clipboard', () => {

        var text = document.getElementById('paragraphs').textContent.trim()

        return subject => navigator.clipboard.writeText(text)
    })
})