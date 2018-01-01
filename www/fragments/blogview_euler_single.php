<?php
require_once (__DIR__ . '/../internals/base.php');
require_once (__DIR__ . '/../internals/blog.php');
require_once (__DIR__ . '/../internals/euler.php');
require_once (__DIR__ . '/../extern/Parsedown.php');

$subview = $OPTIONS['subview'];

$euler   = Euler::listAll();
$problem = Euler::getEulerProblem(intval(explode('-', $subview)[1]));

if ($post === NULL) httpError(404, 'problem not found');

$pd = new Parsedown();


$arr = [];
$max = 0;
foreach ($euler as $elem)
{
	$max = max($max, $elem['number']);
	$arr[$elem['number']] = $elem;
}
$max = ceil($max / 20) * 20;

?>

<div class="blogcontent bc_euler bc_markdown">

    <div style="position: relative;">
        <a href="https://github.com/Mikescher/Project-Euler_Befunge" style="position: absolute; top: 0; right: 0; border: 0;">
            <img src="/data/images/github_band.png" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png">
        </a>
    </div>

	<div class="bc_header">
		<?php echo $problem['date']; ?>
	</div>

	<div class="bc_data">

        <div class="bce_header"><h1><a href="<?php echo $problem['url_euler']; ?>">Problem <?php echo $problem['number3']; ?></a>: <?php echo htmlspecialchars($problem['title']); ?></h1></div>

        <b>Description:</b>
        <div class="bce_description"><?php echo $pd->text(file_get_contents($problem['file_description'])); ?></div>
        <br/>

		<?php if ($problem['abbreviated']): ?>

            <b>Solution:</b>
            <div class="bce_code">
                    <div class="bce_code_data"><?php echo htmlspecialchars(file_get_contents($problem['file_code'])); ?></div>
                <div class="bce_code_ctrl">
                    <div class="ctrl_btn_right">
                        <a class="ctrl_btn" href="<?php echo $problem['url_raw']; ?>" download target="_blank">Download</a>
                    </div>
                </div>
            </div>
            <br/>

		<?php else: ?>

            <b>Solution:</b>
            <div class="bce_code">
                <div class="bce_code_data"><?php echo htmlspecialchars(file_get_contents($problem['file_code'])); ?></div>
                <div class="bce_code_ctrl">
                    <div class="ctrl_btn_left">
                        <div class="ctrl_btn">Start</div>
                        <div class="ctrl_btn">Stop</div>
                        <div class="ctrl_btn">Reset</div>
                    </div>
                    <div class="ctrl_btn_right">
                        <a class="ctrl_btn" href="<?php echo $problem['url_raw']; ?>" download target="_blank">Download</a>
                    </div>
                </div>
            </div>
            <br/>

		<?php endif; ?>

        <b>Explanation:</b>
        <div class="bce_explanation"><?php echo $pd->text(file_get_contents($problem['file_explanation'])); ?></div>
        <br/>

        <table>
            <tr>
                <td><b>Interpreter steps:</b></td>
                <td><?php echo number_format($problem['steps'], 0, null, ' '); ?></td>
            </tr>
            <tr>
                <td><b>Execution time</b> (<a href="/programs/view/BefunGen">BefunExec</a>):</td>
                <td><?php echo $problem['time'] . ' ms <i>(=' . number_format(($problem['steps']/$problem['time'])/1000, 2, '.', '') . ' MHz)</i>'; ?></td>
            </tr>
            <tr>
                <td><b>Program size:</b></td>
                <td><?php echo $problem['width'] . ' x ' . $problem['height']; if ($problem['is93']) echo '<i> (fully conform befunge-93)</i>'; ?></td>
            </tr>
            <tr>
                <td><b>Solution:</b></td>
                <td><?php echo $problem['value']; ?></td>
            </tr>
            <tr>
                <td><b>Solved at:</b></td>
                <td><?php echo $problem['date']; ?></td>
            </tr>
        </table>

        <br />
        <br />

        <div class="bce_pagination">

            <?php
                $break = false;
                for($i1=0;;$i1++)
                {
                    echo "<div class='bce_pag20'>";
					for($i2=0;$i2<2;$i2++)
					{
						echo "<div class='bce_pag10'>";
						for($i3=0;$i3<2;$i3++)
						{
							echo "<div class='bce_pag05'>";
							for($i4=0;$i4<5;$i4++)
							{
                                $ii = $i1*20 + $i2*10 + $i3*5 + $i4 + 1;
								if ($ii > $max) {$break = true; break;}

                                $pii = str_pad($ii, 3, '0', STR_PAD_LEFT);

								if ($ii == $problem['number'])
									echo "<div class='bce_pagbtn bce_pagbtn_active'>" . $pii . "</div>";
								else if (key_exists($ii, $arr))
                                    echo "<a class='bce_pagbtn' href='/blog/1/Project_Euler_with_Befunge/problem-" . $pii . "'>" . $pii . "</a>";
                                else
									echo "<div class='bce_pagbtn bce_pagbtn_disabled'>" . $pii . "</div>";
							}
							echo "</div>";
							if ($break) break;
						}
						echo "</div>";
						if ($break) break;
					}
					echo "</div>";
					if ($break) break;
                }
            ?>

        </div>

	</div>
</div>