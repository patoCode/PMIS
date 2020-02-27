const router = require('express').Router()
var user = require('../controllers/userController')

router.get('/user/login',(req, res)=>{
	res.render('login')
})
router.post('/user/login', user.login)



router.get('/user/list', user.list)
router.post('/user/signin', (req, res) => {
})
router.get('/user/logout', (req, res) => {
})


module.exports = router