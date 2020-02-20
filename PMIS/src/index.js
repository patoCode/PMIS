const express = require('express');
const path = require('path');
const methodOverride = require('method-override');
const session = require('express-session');
const flash = require('connect-flash');
const { format } = require('timeago.js');
const passport = require('passport');

//INIT
const app = express();
require('./database');
require('./config/passport');

// SETTINGS
app.set('port', process.env.PORT || 4000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs')


// MIDDLEWARES
app.use(express.urlencoded({ extended: false }));
app.use(methodOverride('_method'));
app.use(session({
    secret: 'mySecretApp',
    resave: true,
    saveUninitialized: true
}));
app.use(passport.initialize());
app.use(passport.session());
app.use(flash());


// GLOBALS
app.use((req, res, next) => {
    res.locals.success_msg = req.flash('success_msg');
    res.locals.errors_msg = req.flash('errors_msg');
    res.locals.error = req.flash('error');
    res.locals.user = req.user || null;
    next();
});


// ROUTES
app.use(require('./routes'));


// STATIC FILES
app.use('/public', express.static(path.join(__dirname, 'public')));


//SERVER
app.listen(app.get('port'), () => {
    console.log("SERVER RUN!!!", app.get('port'));
});
