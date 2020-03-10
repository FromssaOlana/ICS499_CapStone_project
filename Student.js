// A student object 
function Student(name, studentId) {
    this.name = name;
    this.studentId = studentId;
    this.userName = undefined;
    this.password = undefined;
    this.employer = undefined;
    this.applications = undefined;
    this.applicationsStatus= false;

}

// logs in the student account 
Student.prototype.login = function(userName, password){
    /// do Stuff

};

// logs out the student account
Student.prototype.logout = function(){
    /// do Stuff
};
// creats a application document
Student.prototype.creatApplication = function(){
    /// do Stuff
};

// sighns the document
Student.prototype.signApplication = function(){
    /// do Stuff
};

// views the application status
Student.prototype.viewApplicationStatus = function(){
    /// do Stuff
};


let Fromssa =  new Student('Fromssa', 0101);

