### Laravel-Referral-Code

Laravel包生成4位邀请码并支持解码

### 安装

composer require huilee/laravel-referral-code



### 配置

添加到类到config/app.php到providers

```php
'providers' => [
	...
	HuiLee\ReferralCode\ReferralCodeServiceProvider::class,
]
```

### 使用
	
	生成码
	
	app('referralCode')->encryptCode(1)
 	
 
 	解密码
 	
    app('referralCode')->decryptCode('0005')
    
    
### 说明

这是一个测试包，资源来源于网络。