import 'package:flutter/gestures.dart';
import "package:flutter/material.dart";
import "package:universal_html/html.dart" as html;

import 'interactive_text.dart';

class AppInteractiveNavItem extends MouseRegion {
  static final appContainer =
      html.window.document.querySelectorAll("flt-glass-pane")[0];

  AppInteractiveNavItem(
      {Widget? child,
      required String text,
      required String routeName,
      required bool selected,
      super.key})
      : super(
          onHover: (PointerHoverEvent evt) {
            appContainer.style.cursor = "pointer";
          },
          onExit: (PointerExitEvent evt) {
            appContainer.style.cursor = "default";
          },
          child: InteractiveText(
            text: text,
            routeName: routeName,
            selected: selected,
          ),
        );
}
