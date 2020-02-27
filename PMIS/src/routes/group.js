const router = require('express').Router()
var group = require('../controllers/groupController')

router.get('/group/list', group.list)
router.post('/group/create', group.create)
router.post('/group/addVariable', group.addVariable)




module.exports = router