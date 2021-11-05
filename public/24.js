(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{72:function(t,e,s){"use strict";s.r(e);var a={data:function(){return{editMode:!1,users:{},errors:{},roles:{},userType:"",filterUser:[],is_subsciber:"",form:new Form({id:"",firstname:"",lastname:"",country:"",role:[]})}},methods:{loadUser:function(){var t=this;axios.get("/api/admin/user?api_token="+window.token).then((function(e){t.users=e.data}))},modalUser:function(t){var e=this;this.editMode=!0,this.form.role=[],axios.get("/api/admin/show/"+t+"?api_token="+window.token).then((function(t){e.form.id=t.data.user.id,e.form.firstname=t.data.user.firstname,e.form.lastname=t.data.user.lastname,e.form.country=t.data.user.country,e.roles=t.data.role,null!=t.data.user.is_subscriber?e.is_subsciber=!0:e.is_subsciber=!1,t.data.user.roles.forEach((function(t){e.form.role.push(t.id)})),$("#userModal").modal("show")}))},btnUpdate:function(){var t=this;axios.put("/api/admin/update/"+this.form.id+"?api_token="+window.token,this.form).then((function(e){t.form.role=[],t.loadUser(),$("#userModal").modal("hide"),t.$notify({group:"notification",type:"success",title:"Update User",text:"User record has been updated"})})).catch((function(e){t.errors=e.response.data.errors}))},btnDelete:function(){var t=this;axios.get("/api/admin/delete/"+this.form.id+"?api_token="+window.token).then((function(e){t.loadUser(),$("#userModal").modal("hide"),t.$notify({group:"notification",type:"error",title:"Delete User",text:"User has been deleted"})}))},addUserModal:function(){var t=this;this.errors=[],this.editMode=!1,this.form.role=[],this.form.firstname="",this.form.lastname="",this.form.country="",axios.get("/api/admin/role/?api_token="+window.token).then((function(e){t.roles=e.data})),$("#userModal").modal("show")},addUser:function(){var t=this;axios.post("/api/admin/store?api_token="+window.token,this.form).then((function(e){t.loadUser(),$("#userModal").modal("hide"),t.$notify({group:"notification",type:"success",title:"Add User",text:"New User has been Created"})})).catch((function(e){t.errors=e.response.data.errors}))},filter:function(){var t=this;this.filterUser=[],"all"==this.userType?this.loadUser():axios.post("/api/admin/user/type?api_token="+window.token,{type:this.userType}).then((function(e){t.users=e.data,e.data.forEach((function(e){t.filterUser.push(e.user)})),t.users=t.filterUser}))},isBan:function(t,e){var s=this;this.$swal({title:"Are you sure?",text:0==e?"You want to deactivate this user":"You want to activate this user",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:0==e?"Yes, deactivate this user!":"Yes, activate this user!"}).then((function(t){t.value&&s.$swal(0==e?"Deactivated!":"Activated",0==e?"This user has been Deactivated.":"This user has been Activated","success")}))},btnSubscribe:function(){var t=this;this.$swal({title:"Are you sure?",text:"You want to change status this user",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Yes"}).then((function(e){e.value&&t.userStatusChange()}))},userStatusChange:function(){var t=this;axios.get("/api/user/change-status/"+this.form.id+"/?api_token="+window.token).then((function(e){$("#userModal").modal("hide"),t.$swal("Status Change Success"),t.loadUser()}))}},mounted:function(){this.loadUser()}},o=s(0),r=Object(o.a)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("div",{staticClass:"card mb-3"},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"row justify-content-end"},[s("div",{staticClass:"col-md-3 "},[s("select",{directives:[{name:"model",rawName:"v-model",value:t.userType,expression:"userType"}],staticClass:"form-control",attrs:{name:"",id:""},on:{change:[function(e){var s=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.userType=e.target.multiple?s:s[0]},t.filter]}},[s("option",{attrs:{value:"",disabled:"",hidden:""}},[t._v("Select User Type")]),t._v(" "),s("option",{attrs:{value:"all"}},[t._v("All")]),t._v(" "),s("option",{attrs:{value:"user"}},[t._v("User")]),t._v(" "),s("option",{attrs:{value:"admin"}},[t._v("Admin")]),t._v(" "),s("option",{attrs:{value:"consultant"}},[t._v("Consultant")])])]),t._v(" "),s("button",{staticClass:"button-success mr-2",on:{click:t.addUserModal}},[t._v("Add User")])])])]),t._v(" "),s("div",{staticClass:"card"},[s("div",{staticClass:"card-body"},[s("table",{staticClass:"table table-hover"},[t._m(0),t._v(" "),s("tbody",t._l(t.users,(function(e){return s("tr",{key:e.id},[s("td",[s("span",{staticStyle:{cursor:"pointer"},on:{click:function(s){return t.isBan(e.id,e.isBan)}}},[s("svg",{staticStyle:{width:"24px",height:"24px"},attrs:{viewBox:"0 0 24 24",title:"deactivated"}},[s("path",{attrs:{fill:0==e.isBan?"green":"red",d:"M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"}})])])]),t._v(" "),s("td",[t._v(t._s(e.firstname))]),t._v(" "),s("td",[t._v(t._s(e.lastname))]),t._v(" "),s("td",[t._v(t._s(e.country))]),t._v(" "),s("td",t._l(e.roles,(function(e,a){return s("span",{key:a,staticClass:"badge badge-success mr-2"},[t._v("\n                                "+t._s(e.name)+"\n                            ")])})),0),t._v(" "),s("td",{class:e.is_subscriber?"text-success":"text-danger",domProps:{textContent:t._s(e.is_subscriber?"Subscriber":"Not Subscriber")}}),t._v(" "),s("td",{staticClass:"text-right"},[s("button",{staticClass:"button-primary",on:{click:function(s){return t.modalUser(e.id)}}},[s("svg",{staticStyle:{width:"20px",height:"20px"},attrs:{viewBox:"0 0 24 24"}},[s("path",{attrs:{fill:"currentColor",d:"M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z"}})]),t._v("\n                                View\n                            ")])])])})),0)])]),t._v(" "),s("notifications",{attrs:{group:"notification",position:"bottom right"}}),t._v(" "),s("div",{staticClass:"modal fade",attrs:{id:"userModal",tabindex:"-1",role:"dialog","aria-labelledby":"exampleModalLabel","aria-hidden":"true"}},[s("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLabel"},domProps:{textContent:t._s(t.editMode?"Edit User":"Add User")}}),t._v(" "),t._m(1)]),t._v(" "),s("div",{staticClass:"modal-body"},[s("div",{directives:[{name:"show",rawName:"v-show",value:!t.editMode,expression:"!editMode"}]},[s("label",{attrs:{for:"firstname"}},[t._v("Email Address")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.email,expression:"form.email"}],staticClass:"form-control",attrs:{type:"email"},domProps:{value:t.form.email},on:{input:function(e){e.target.composing||t.$set(t.form,"email",e.target.value)}}}),t._v(" "),t.errors.email?s("span",{staticClass:"font-italic text-danger",domProps:{textContent:t._s(t.errors.email[0])}}):t._e()]),t._v(" "),s("div",{},[s("label",{attrs:{for:"firstname"}},[t._v("First Name")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.firstname,expression:"form.firstname"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.form.firstname},on:{input:function(e){e.target.composing||t.$set(t.form,"firstname",e.target.value)}}}),t._v(" "),t.errors.firstname?s("span",{staticClass:"font-italic text-danger",domProps:{textContent:t._s(t.errors.firstname[0])}}):t._e()]),t._v(" "),s("div",{staticClass:"mt-1"},[s("label",{attrs:{for:"lastname"}},[t._v("Last Name")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.lastname,expression:"form.lastname"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.form.lastname},on:{input:function(e){e.target.composing||t.$set(t.form,"lastname",e.target.value)}}}),t._v(" "),t.errors.lastname?s("span",{staticClass:"font-italic text-danger",domProps:{textContent:t._s(t.errors.lastname[0])}}):t._e()]),t._v(" "),s("div",{staticClass:"mt-1"},[s("label",{attrs:{for:"address"}},[t._v("Country")]),t._v(" "),s("country-select",{staticClass:"form-control",attrs:{countryName:!0,country:t.form.country,topCountry:"US"},model:{value:t.form.country,callback:function(e){t.$set(t.form,"country",e)},expression:"form.country"}}),t._v(" "),t.errors.country?s("span",{staticClass:"font-italic text-danger",domProps:{textContent:t._s(t.errors.country[0])}}):t._e()],1),t._v(" "),s("div",{staticClass:"mt-1"},[s("label",{attrs:{for:"role"}},[t._v("Role")]),t._v(" "),t._l(t.roles,(function(e){return s("div",{key:e.is},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.role,expression:"form.role"}],attrs:{type:"checkbox"},domProps:{value:e.id,checked:Array.isArray(t.form.role)?t._i(t.form.role,e.id)>-1:t.form.role},on:{change:function(s){var a=t.form.role,o=s.target,r=!!o.checked;if(Array.isArray(a)){var i=e.id,n=t._i(a,i);o.checked?n<0&&t.$set(t.form,"role",a.concat([i])):n>-1&&t.$set(t.form,"role",a.slice(0,n).concat(a.slice(n+1)))}else t.$set(t.form,"role",r)}}}),t._v(t._s(e.name)+"\n                            ")])}))],2)]),t._v(" "),s("div",{staticClass:"p-1"},[s("button",{staticClass:"btn w-100",class:t.is_subsciber?"btn-danger":"btn-success",domProps:{textContent:t._s(t.is_subsciber?"Unsubscibe this User":"Subscribe this User")},on:{click:t.btnSubscribe}})]),t._v(" "),s("div",{staticClass:"modal-footer"},[s("button",{directives:[{name:"show",rawName:"v-show",value:1!=t.form.id&&t.editMode,expression:"form.id != 1 && editMode"}],staticClass:"btn btn-secondary mr-auto",attrs:{type:"button","data-dismiss":"modal"},on:{click:t.btnDelete}},[t._v("Delete")]),t._v(" "),s("button",{staticClass:"btn btn-secondary",attrs:{type:"button","data-dismiss":"modal"}},[t._v("Close")]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:1!=t.form.is_admin&&t.editMode,expression:"form.is_admin != 1 && editMode"}],staticClass:"btn btn-primary",attrs:{type:"button"},on:{click:t.btnUpdate}},[t._v("Save changes")]),t._v(" "),s("button",{directives:[{name:"show",rawName:"v-show",value:!t.editMode,expression:"!editMode"}],staticClass:"btn btn-success",attrs:{type:"button"},on:{click:t.addUser}},[t._v("Add User")])])])])])],1)])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("thead",[s("tr",[s("th",[t._v("Is Active")]),t._v(" "),s("th",[t._v("First Name")]),t._v(" "),s("th",[t._v("Last Name")]),t._v(" "),s("th",[t._v("Address")]),t._v(" "),s("th",[t._v("Role")]),t._v(" "),s("th",[t._v("Status")]),t._v(" "),s("th",{staticClass:"text-right"},[t._v("Action")])])])},function(){var t=this.$createElement,e=this._self._c||t;return e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[this._v("×")])])}],!1,null,null,null);e.default=r.exports}}]);