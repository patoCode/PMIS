function clickTable(className) {

    var test = document.querySelector(className)

    test.addEventListener('click', function (e) {
        e.preventDefault()
        console.log('Congrats! You have reached the clickController!')
    })

}