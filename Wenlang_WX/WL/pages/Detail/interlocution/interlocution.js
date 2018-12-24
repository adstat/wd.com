// pages/Detail/interlocution/interlocution.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    aflags: true,
    showa: "show",
    flag: true,
    id: 0,
    tit_con: "集装箱",
    menu_items: [],
    none: "none",
    block: "block",
    add: "",
    heigth:85,
  },
  showa: function () {
    this.setData({ flag: false })
  },
  //弹窗消失
  // hide: function () {
  //   this.setData({ showa: "show" })
  //   this.setData({ flag: true })
  // },
  all: function () {
    var that = this
    that.setData({
      height:129,
      showMore: !this.data.showMore
    })
  },
  alls: function () {
    var that = this
    that.setData({
      height: 85,
    })
  },
  // 展开全部显示
  spread:function(e){

  },
  //弹窗消失
  // hide: function () {
  //   this.setData({ showa: "show" })
  //   this.setData({ flag: true })
  // },
  select: function (e) {
    var that = this;
    that.setData({
      id: e.target.dataset.id,
      tit_con: e.target.dataset.tit,
      menu_items: [],
    })

    // that.getList();
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  },

  // 跳转至我的答主设置
  dzsz:function(e){
   wx.navigateTo({
     url:'../../my_page/answer_master/answer_master',
    })
  },

  content:function(){
    wx.navigateTo({
       url: '../user_install/user_install',
    })
  },

  // pay_m:function(){
  //   wx.navigateTo({
  //     url: '../Paydetali/Paydetali',
  //   })
  // }
})