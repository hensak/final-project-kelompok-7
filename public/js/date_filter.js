function searchDate(x, dd_1, dd_2, mm_1, mm_2, yy_1, yy_2, dmy_1, dmy_2) {
  // MEMASUKKAN 2 TANGGAL
  if(dmy_1 != dmy_2) {
    while(dmy_1 != dmy_2) {
      // UNTUK HITUNG LEBIH DARI 1 TAHUN
      if(yy_1 < yy_2) {
        if(mm_1 < 13) {
          if(dd_1 < 32) {
            dmy_1 = yy_1+'-'+ (mm_1.toString().length == 1 ? `0${mm_1}` : mm_1) +'-'+ (dd_1.toString().length == 1 ? `0${dd_1}` : dd_1);
            dd_1+=1;
            if(dd_1 == 32) {
              dd_1 = 1;
              mm_1+=1;
              if(mm_1 == 13) {
                mm_1 = 1;
                yy_1+=1;
              }
            }
          }
        }
      }
      // UNTUK HITUNG LEBIH DARI 1 BULAN
      else if(yy_1 == yy_2) {
        if(mm_1 < mm_2) {
          if(dd_1 < 32) {
            dmy_1 = yy_1+'-'+ (mm_1.toString().length == 1 ? `0${mm_1}` : mm_1) +'-'+ (dd_1.toString().length == 1 ? `0${dd_1}` : dd_1);
            dd_1+=1;
            if(dd_1 == 32) {
              dd_1 = 1;
              mm_1+=1;
            }
          }
        }
        else if(mm_1 == mm_2) {
          if(dd_1 <= dd_2) {
            dmy_1 = yy_1+'-'+ (mm_1.toString().length == 1 ? `0${mm_1}` : mm_1) +'-'+ (dd_1.toString().length == 1 ? `0${dd_1}` : dd_1);
            dd_1+=1;
          }
        }
      }
      // console.log(dd_1);
      // console.log(dmy_1);
      dmyArr[x] = dmy_1;
      x++;
    }
  }
  // HANYA MEMASUKKAN 1 TANGGAL
  else if(dmy_1 == dmy_2)
    dmyArr[0] = dmy_1;
  return null;
}

let dmyArr = [];
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    // console.log("date selection: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    // console.log($('.card'));
    let threadList = $('.card'), threadBlock = [], threadNone = [];
    let dmy_1 = start.format('YYYY-MM-DD'),
        dmy_2 = end.format('YYYY-MM-DD');
    // console.log(dmy_1, dmy_2);
    // for(let i=0; i<dmy_1.length; i++) // TESTING VALUE INPUT SBG ARRAY
    //   console.log(dmy_1[i]);
    let tglSplit_1 = dmy_1.split('-'),
        tglSplit_2 = dmy_2.split('-');
    // console.log(+tglSplit_1[0]+1); // PERLU + DI DEPAN tglSplit_1
    // console.log(tglSplit_1, tglSplit_2);
    let x = 0;
    let dd_1 = +tglSplit_1[2], dd_2 = +tglSplit_2[2],
        mm_1 = +tglSplit_1[1], mm_2 = +tglSplit_2[1],
        yy_1 = +tglSplit_1[0], yy_2 = +tglSplit_2[0];
    // console.log(dd_1, dd_2, mm_1, mm_2, yy_1, yy_2, dmy_1, dmy_2);
    searchDate(x, dd_1, dd_2, mm_1, mm_2, yy_1, yy_2, dmy_1, dmy_2);
    // console.log(dmyArr);
    for(let tl of threadList) {
      // console.log(tl);
      // console.log(dmyArr.map(v=>{return v}).indexOf(tl.dataset.created));
      let pos = dmyArr.map(v=>{return v}).indexOf(tl.dataset.created);
      if(pos > -1) {
        // console.log(dmyArr[pos]);
        // console.log(tl);
        tl.style.display = 'block';
      }
      else {
        tl.style.display = 'none';
      }
    }
    dmyArr = [];
  });
});
