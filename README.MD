# LOG CONVERTER

####Clone the repository in ezproxy root directory /usr/local/ezproxy
```sh
$ git clone https://github.com/juan-kabbali/LogConverter.git
```

####Modify linux permissions, grant execution for owner user
```sh
$ chmod 744 LogConverter/Logconverter.php
```

####Execute the LogConverter.php file

The command has 3 inputs
   
> **--help**
>
> *deploy the command usage* 

> **--directory**
>
>*to specify the directory where the logs are placed. By default, the command will search in /usr/local/ezproxy/docs/loggedin/*

> **--format**
>
>*to specify the logs format. By default, the command will use \*.log*

####Examples

The command will use default values, i.e. it will search the logs in **/usr/local/ezproxy/docs/loggedin/** with **\*.log** format 
```sh
$ Logconverter.php
```


