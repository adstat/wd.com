// pages/Detail/report/report.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    // flags: true,
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
  // 提交
  // submit:function(e){
  //   wx.showModal({
  //     title: '内容未发布，确认退出吗？',
  //     content: '这是一个模态弹窗',
  //     // content: res.msg,
  //     // success: function (res) {
  //     //   if (res.confirm) {
  //     //     // 点击确定
  //     //     wx.navigateBack({

  //     //     })
  //     //   } else if (res.cancel) {
  //     //     // 点击取消

  //     //   }
  //     // }
  //   })
  // }


  xcPage: function () {
    var that = this
    that.setData({
      flags: true,
      tabBarHid: false
    })
  },
})