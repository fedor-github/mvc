// DOM - Document Object Model
window.addEventListener('load', () => {
    const helloButton = document.getElementsByClassName('js-say-hello')[0]
    helloButton.addEventListener('click', () => window.alert('Hello!'))
})
