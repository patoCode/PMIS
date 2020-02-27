const router = require('express').Router()
var form = require('../controllers/formController')

router.get('/form/list', form.list)
router.post('/form/create', form.create)
router.post('/form/addGroup', form.addGroup)




module.exports = router