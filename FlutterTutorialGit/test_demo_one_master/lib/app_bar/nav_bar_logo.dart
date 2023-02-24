import 'package:flutter/material.dart';

class NavBarLogo extends StatelessWidget {
  final double height;
  const NavBarLogo({this.height = 60, super.key});
  @override
  Widget build(BuildContext context) {
    return Column(
      mainAxisAlignment: MainAxisAlignment.start,
      children: [
        Image.asset(
          'assets/tm.png',
          height: height,
        ),
      ],
    );
  }
}
