# Usage: This script should only be executed once during the setup of the machine for the OAS application.
#        In addition, the script should be run in powershell (admin mode).
#
# This script replaces all of the environment variables from .env. 
####################### Troubleshooting: #######################
# In case one runs into the following errors:
# .\test.ps1 : File C:\users\stf9818\Desktop\test.ps1 cannot be loaded because running scripts is disabled on this system. For more information, see 
# about_Execution_Policies at https:/go.microsoft.com/fwlink/?LinkID=135170.
# At line:1 char:1
# + .\test.ps1
# + ~~~~~~~~~~
# + CategoryInfo          : SecurityError: (:) [], PSSecurityException
# + FullyQualifiedErrorId : UnauthorizedAccess
# one should manually execute set-executionpolicy -force unrestricted
# and untoggle the unrestricted mode via: set-executionpolicy -force restricted after running the script.
################################################################
set-executionpolicy -force unrestricted
[System.Environment]::SetEnvironmentVariable('APP_NAME','OAS',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('APP_ENV','local',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('APP_KEY','base64:PIF75bOH4o8WpdBbfIY26Mi77S5gkoGc3xOS/hdS1sc=',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('APP_DEBUG','true',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('APP_URL','http://localhost',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_CONNECTION','mysql',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_HOST','127.0.0.1',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_POST','3306',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_DATABASE','oas',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_USERNAME','root',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_PASSWORD','DHkt@2020B',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_CONNECTION_SECOND','mysql',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_HOST_SECOND','192.168.0.210',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_PORT_SECOND','3306',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_DATABASE_SECOND','registration',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_USERNAME_SECOND','yifan',[System.EnvironmentVariableTarget]::Machine)
[System.Environment]::SetEnvironmentVariable('DB_PASSWORD_SECOND','@2022C',[System.EnvironmentVariableTarget]::Machine)
set-executionpolicy -force restricted