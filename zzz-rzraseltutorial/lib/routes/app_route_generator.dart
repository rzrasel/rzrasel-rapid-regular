import "package:flutter/material.dart";
import '../pages/about_page.dart';
import '../pages/contact_page.dart';
import '../pages/home_page.dart';
import 'app_routes.dart';

class AppRouteGenerator {
  static Route<dynamic>? generateRoute(RouteSettings settings) {
    switch(settings.name) {
      case routeHome:
        return MaterialPageRoute(builder: (_) => const HomePage());
      case routeAbout:
        return MaterialPageRoute(builder: (_) => const AboutPage());
      case routeContact:
        return MaterialPageRoute(builder: (_) => const ContactPage());
    }
    return null;
  }
}