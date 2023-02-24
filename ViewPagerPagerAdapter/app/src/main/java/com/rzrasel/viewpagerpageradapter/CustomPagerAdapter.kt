package com.rzrasel.viewpagerpageradapter

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.viewpager.widget.PagerAdapter

class CustomPagerAdapter(
    private val context: Context,
    private val pagerModelList: ArrayList<ModelObject>
) :
    PagerAdapter() {
    private var layoutInflater: LayoutInflater? = null

    override fun instantiateItem(container: ViewGroup, position: Int): Any {
        layoutInflater = LayoutInflater.from(context)
        val view = layoutInflater!!.inflate(R.layout.layout_pager_view_one, container, false)
        val sysTextView: TextView = view.findViewById(R.id.sysTextView)
        sysTextView.text = pagerModelList[position].title
        container.addView(view, position)
        return view
    }

    override fun getCount(): Int {
        return pagerModelList.size
    }

    override fun isViewFromObject(view: View, obj: Any): Boolean {
        return view === obj
    }

    override fun destroyItem(container: ViewGroup, position: Int, `object`: Any) {
        val view = `object` as View
        container.removeView(view)
    }
}

//https://prasanthvel.medium.com/create-custom-viewpager-in-android-android-kotlin-tutorial-b4c7eff76488
