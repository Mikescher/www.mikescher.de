import std/strutils
import std/sequtils

proc run04_1(): string =
    const input = staticRead"../input/day04.txt"

    var ctr = 0

    let lines = splitLines(input).filter(proc(p: string): bool = p != "")

    for line in lines:

        let pairs = line.split(",")
        let sec1s = parseInt(pairs[0].split("-")[0])
        let sec1e = parseInt(pairs[0].split("-")[1])
        let sec2s = parseInt(pairs[1].split("-")[0])
        let sec2e = parseInt(pairs[1].split("-")[1])

        if sec1s <= sec2s and sec2e <= sec1e:
            ctr+=1 # sec2 in sec1
            echo "[", sec2s, "..", sec2e, "]", " fully in ", "[", sec1s, "..", sec1e, "]"
        elif sec2s <= sec1s and sec1e <= sec2e:
            ctr+=1 # sec1 in sec2
            echo "[", sec1s, "..", sec1e, "]", " fully in ", "[", sec2s, "..", sec2e, "]"
        else:
            echo "[", sec1s, "..", sec1e, "]", " no overlap ", "[", sec2s, "..", sec2e, "]"

    return intToStr(ctr)


when not defined(js):
    echo run04_1()
else:
    proc js_run04_1(): cstring {.exportc.} =
        return cstring(run04_1())
