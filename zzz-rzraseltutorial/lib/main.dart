import "package:flutter/material.dart";
import 'package:rzraseltutorial/routes/app_route_generator.dart';
import 'package:rzraseltutorial/routes/app_routes.dart';

import 'app_view.dart';
import 'pages/home_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: "Rz Rasel Tutorial",
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      builder: (context, child) => AppView(
        child: child!,
      ),
      initialRoute: routeHome,
      navigatorKey: navKey,
      onGenerateRoute: AppRouteGenerator.generateRoute,
    );
  }
}
