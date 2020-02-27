const router = require('express').Router()

router.get('/',(req, res) => {
	res.render('index')
})

router.get('/login',(req, res)=>{
	res.render('user/login');
});

router.get('/about', (req, res)=>{
	res.render('about');
})

module.exports = router;