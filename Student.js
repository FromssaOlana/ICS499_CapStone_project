// A student object 
function Student(name, studentId) {
    this.name = name;
    this.studentId = studentId;
    this.userName = undefined;
    this.password = undefined;
    this.employer = undefined;
    this.applications = [];
    this.applicationsStatus= undefined;

}


// sets username 
Student.prototype.setUserName = function(userName){
    this.userName = userName;
 };
 // sets user password
 Student.prototype.setPassWord = function(password){
     this.password = password;
  };
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
    // just for a test 
    this.applications.push(function application(){
            applName: "Targer intern"
    })
};

Student.prototype.findApplication = function(appName){
    return this.applications.find
}

// sighns the document
Student.prototype.signApplication = function(){
    /// do Stuff
};

// set the application status
Student.prototype.setApplicationStatus = function(status){
     this.applicationsStatus = status;
};

// views the application status
Student.prototype.viewApplicationStatus = function(){
    return this.applicationsStatus;
};

// sets employer
Student.prototype.setEmployer = function(employer){
        this.employer = employer;
};

Student.prototype.addApliction = function(application){
        this.applications = application;
};


