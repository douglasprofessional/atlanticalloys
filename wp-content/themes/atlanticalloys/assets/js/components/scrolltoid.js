window.addEventListener('load', function () {
  if (document.querySelectorAll('.scroll-to-id').length) {
    const elements = document.querySelectorAll('.scroll-to-id')
    elements.forEach(function (element) {
      element.addEventListener('click', function (e) {
        e.preventDefault()
        const id = this.getAttribute('href')
        window.scrollTo({
          top: document.querySelector(id).offsetTop - 100,
          behavior: 'smooth'
        })
      })
    })
  }
})
