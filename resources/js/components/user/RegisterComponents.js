Vue.component(
    'home-user',
    ()=>import("../user/homeUser")
);

Vue.component(
    'registration-user',
    ()=>import("../user/RegisterComponent")
);

Vue.component(
    'profile-user',
    ()=>import("../user/ProfileComponent")
);

Vue.component(
    'booking-user',
    ()=>import("../user/BookComponent")
);

Vue.component(
    'consultant-user',
    ()=>import("../user/ConsultantComponent")
);

Vue.component(
    'schedule-user',
    ()=>import("../user/ScheduleComponent")
);