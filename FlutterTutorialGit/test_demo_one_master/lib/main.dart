import 'package:flutter/material.dart';
import 'package:test_demo_one_master/main_page/main_page.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Directionality(
      textDirection: TextDirection.ltr,
      child: MaterialApp(
        debugShowCheckedModeBanner: false,
        title: "Rz Rasel Tutorial",
        theme: ThemeData(
          brightness: Brightness.dark,
          primaryColor: Colors.white,
        ),
        home: MainPage(),
      ),
    );
  }
}
