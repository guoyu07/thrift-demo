# thrift-demo
thrift php demo, 该样例用于展示使用jenkins持续构建(CI),以及使用thrift开发rpc接口.它并不包含thrift的php运行时容器的实现,[workermand](https://github.com/potterhe/workermand)是一个php的运行时容器实现.

thrift定义文件来自apache官方[tutorial/tutorial.thrift](http://git-wip-us.apache.org/repos/asf?p=thrift.git;a=blob;f=tutorial/tutorial.thrift;hb=HEAD)

```sh
thrift -r --gen php:server tutorial.thrift
```

## handler组织
与gen-php目录类似,使用handler\NS\SERVICE 的形式组织代码.

## jenkins
### jenkins project配置
- 源码管理. 选择Git, Repository URL: https://github.com/potterhe/thrift-demo.git, 其它默认.
- 构建触发器. 选择 "Poll SCM", 日程表:"H/5 * * * *"(轮询的方式发现变更，周期为每5分钟).通过安装"github plugin",可以通过github的http post推送获取实时的代码变更通知,不过这需要github可以访问到你.如果使用自建仓库，可以使用[post-receive hook](http://stackoverflow.com/questions/12794568/how-to-configure-git-post-commit-hook)触发.
- 构建. 增加构建步骤, 类型"Execute shell", 输入以下shell脚本. 请确认在jenkins主机上已经安装了构建所需的工具集:thrift,composer,phpunit. http://jenkins-php.org/ 提供一个解决方案.
```sh
cd ${WORKSPACE}
thrift -r --gen php:server tutorial.thrift
composer install
phpunit
```
