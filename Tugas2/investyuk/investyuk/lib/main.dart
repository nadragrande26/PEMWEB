import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'splashscreen.dart';  // Import SplashScreen

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      title: 'Invest Yuk',
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      home: SplashScreen(),  // SplashScreen sebagai halaman awal
    );
  }
}
