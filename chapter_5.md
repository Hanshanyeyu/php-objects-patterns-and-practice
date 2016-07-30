####第五章
#对象工具

###概览
* 命名空间和包
* 自动加载
* 对象工具
* 反射API

###5.1 PHP 的命名空间和包
包是一组相关类的集合,可以把类以包的形式组合在一起,同时把不同包之间的代码分隔开来。PHP目前还没有包的概念,但是PHP 5.3及以后的版本可以支持命名空间。

* Java包与PHP 命名空间的区别
	1. Java的包必须与存储路径对应, PHP则不需要.
	2. Java的一个源文件只能属于一个包,PHP一个脚本文件则可以定义多个namespace
	3. Java 需要依赖包加载类,在Java的安全机制中具有重要意义,PHP则是先加载文件,再声明命名空间.

* 为什么需要命名空间
	1. 类冲突 [5.1.1](chapter 5/1/1/index.php)
		```
			Fatal error: Cannot redeclare class Outputter
		```
	2. 为保证唯一性,类名会复杂并且越来越长.影响可读性
		```
			class Mage_Catalog_Model_Product extends Mage_Catalog_Model_Abstract{
			}
		```
	3. 命名空间解决问题
		```	
			namespace Magento\Catalog\Model;
			class Product extends \Magento\Catalog\Model\AbstractModel {
			}
		```
* 命名空间实例 [5.1.2](chapter 5/1/2/index.php)

###5.2 自动加载

*  自动加载 ``__autoload()`` 实例 [5.2.1](chapter 5/2/1/index.php)

*  声明自动加载方法 ``spl_autoload_register`` 实例 [5.2.2](chapter 5/2/2/index.php)

		```
			bool spl_autoload_register 
			([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )
			
		```

	1. **$autoload_function** 
	 欲注册的自动装载函数。如果没有提供任何参数，则自动注册 *autoload* 的默认实现函数*spl_autoload()*。
	2. **$throw** 此参数设置了 **autoload_function** 无法成功注册时， *spl_autoload_register()* 是否抛出异常。
	3. **$prepend** 如果是 **true**，*spl_autoload_register()* 会添加函数到队列之首，而不是队列尾部。
	
###5.3 对象工具
    
   1. **class_exists()** 检查类是否存在
   2. **get_declared_classes()** 获取所有定义的类返回一个数组
   3. **get_class()** 检查类对象,返回对象类名
   4. **instanceof** 检测左侧对象是否为右侧类或接口实力
   5. **get_class_methods()** 获取类中所有方法列表
   6. **is_callable(array( $product, 'method' ))** 判断$product 中method是否可调用
   7. **method_exists( $product , 'method' )** 判断$product 中是否存在method方法, private/protected/public 都会返回true
   8. **get_class_vars('CdProduct')** 获取 CdProduct 类中的所有属性.
   9. **get_parent_class('CdProduct')** 判断CdProduct 有没有父类,若无则返回false,有则返回父类名称
   10. **is_subclass_of( $product , 'ShopProduct')** 判断$product是不是继承 ShopProduct类,判断不了接口
   11. **call_user_func( array( $myObj , 'methodName') , $args)** 调用$myObj 下的methodName 方法 [5.3.1 方法调用 call_user_func()](chapter 5/3/1/index.php)
   
###5.4 反射API
PHP中的反射API与Java中的java.lang.reflect包一样,它是由一系列可以分析的属性/方法和类的内置类组成.

   * 反射的部分类
        1. **Reflection** 为类的摘要信息提供静态函数export()
        2. **ReflectionClass** 类的信息和工具
        3. **ReflectionMethod** 类的方法信息和工具
        4. **ReflectionParameter** 方法参数信息
        5. **ReflectionProperty** 类属性信息
        6. **ReflectionFunction** 函数信息和工具
        7. **ReflectionExtension**  PHP扩展信息
        8. **ReflectionException**  错误类信息
   
   * 示例
        1. [前后置方法实现](chapter 5/4/2/index.php)
        2. [接口实例自动实例化并调用方法](chapter 5/4/3/index.php)
   
   
    



