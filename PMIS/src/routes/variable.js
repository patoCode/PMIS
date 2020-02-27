const router = require('express').Router()
var variable = require('../controllers/variableController')

router.get('/variable/list', variable.list)
router.post('/variable/create', variable.create)




module.exports = router