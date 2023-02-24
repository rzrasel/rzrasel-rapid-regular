import "package:flutter/material.dart";
import 'package:rzraseltutorial/widgets/app_interactive_nav_item.dart';
import '../routes/app_routes.dart';

class AppNavigationItem extends StatelessWidget {
  final String title;
  final String routeName;
  final bool selected;
  final Function onHighlight;

  const AppNavigationItem(
      {required this.title,
      required this.routeName,
      required this.selected,
      required this.onHighlight,
      Key? key})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        navKey.currentState?.pushNamed(routeName);
        onHighlight(routeName);
      },
      child: Padding(
        padding: const EdgeInsets.symmetric(
          horizontal: 50.0,
        ),
        child: AppInteractiveNavItem(
          text: title,
          routeName: routeName,
          selected: selected,
        ),
      ),
    );
  }
}
