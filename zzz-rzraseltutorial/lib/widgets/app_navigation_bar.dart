import "package:flutter/material.dart";
import 'package:rzraseltutorial/routes/app_routes.dart';
import 'package:rzraseltutorial/widgets/app_navigation_item.dart';

class AppNavigationBar extends StatefulWidget {
  const AppNavigationBar({Key? key}) : super(key: key);

  @override
  State<AppNavigationBar> createState() => _AppNavigationBarState();
}

class _AppNavigationBarState extends State<AppNavigationBar> {
  int index = 0;
  @override
  Widget build(BuildContext context) {
    return Container(
      height: 100.0,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.end,
        mainAxisSize: MainAxisSize.max,
        children: [
          AppNavigationItem(
            selected: index == 0,
            title: "Home",
            routeName: routeHome,
            onHighlight: onHighlight,
          ),
          AppNavigationItem(
            selected: index == 1,
            title: "About",
            routeName: routeAbout,
            onHighlight: onHighlight,
          ),
          AppNavigationItem(
            selected: index == 2,
            title: "Contact",
            routeName: routeContact,
            onHighlight: onHighlight,
          ),
        ],
      ),
    );
  }

  void onHighlight(String route) {
    switch(route) {
      case routeHome:
        changeHighlight(0);
        break;
      case routeAbout:
        changeHighlight(1);
        break;
      case routeContact:
        changeHighlight(2);
        break;
    }
  }

  void changeHighlight(int newIndex) {
    setState(() {
      index = newIndex;
    });
  }
}
