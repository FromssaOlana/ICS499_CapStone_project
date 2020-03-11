/*
This is a an Employer prototype
*/

function Employer(name, employerID) {
    this.name = name;
    this.employerID =employerID;
    this.userName = undefined;
    this.password = undefined;
    this.employees = [];
        

}

// sets username 
Student.prototype.setUserName = function(userName){
    this.userName = userName;
 };
 // sets user password
 Student.prototype.setPassWord = function(password){
     this.password = password;
  };
// adds employee to a list
Employer.prototype.addEmployee = function(student){
   // this.employees[this.studentSize++] = student;
   this.employees.push(student);
}

// removes stuent from a list
/*
this method is not in the class diagram just added it incase 
an employer wantes to remove a student from its list for some reason.
"It can be removed also :)"
*/
Employer.prototype.removeEmployee = function(studentId){
     this.employees =  this.employees.filter(std => {
            return std.studentId !=studentId;
        })
}

// logs in the employer account 
Employer.prototype.login = function(userName, password){
    /// do Stuff

};

// logs out the employer account
Employer.prototype.logout = function(){
    /// do Stuff
};
// gets appliction by name 
Employer.prototype.getStudentApplication = function(studentId){
    return (this.employees.filter(emp => emp.studentId == studentId))[0];
}
// returns appliction by studentid 
Employer.prototype.getStudentApplication = function(name){
    return (this.employees.filter(emp => emp.name == name))[0];
}